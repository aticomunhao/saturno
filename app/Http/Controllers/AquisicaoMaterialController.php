<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatalogoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolMaterial;
use App\Models\TipoStatusSolMt;
use App\Models\TipoMaterial;
use App\Models\TipoCategoriaMaterial;
use App\Models\Setor;
use App\Models\Documento;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;


use function Laravel\Prompts\select;

class AquisicaoMaterialController extends Controller
{

    public function index(Request $request)
    {

        $query = SolMaterial::with(['tipoMaterial', 'tipoStatus', 'setor']);

        if ($request->status_servico) {
            $query->where('status', $request->status_servico);
        }
        if ($request->classe) {
            $query->where('id_classe_sv', $request->classe);
        }
        if ($request->servicos) {
            $query->where('id_tp_sv', $request->servicos);
        }

        $aquisicao = $query->orderBy('id')->paginate(20);

        //dd($aquisicao);

        $status = TipoStatusSolMt::all();
        $tipoMaterial = TipoMaterial::all();
        $categoriaMaterial = TipoCategoriaMaterial::all();




        return view('aquisicao.gerenciar-aquisicao-material', compact('aquisicao','categoriaMaterial', 'tipoMaterial', 'status'));
    }

    public function retornaTipoMaterial($idClasse)
    {
        $tipoMaterial = TipoMaterial::where('id_categoria_material',$idClasse)->get();
        return response()->json($tipoMaterial);
    }

    public function create(Request $request)
    {

        $setor = session()->get('usuario.setor', 'cpf');

        //dd($setor);

        $buscaSetor = Setor::whereIn('id', $setor)->get();
        $tipoCategoriaMaterial = TipoCategoriaMaterial::all();
        //$servico = SolServico::all();
        //$classeAquisicao = TipoClasseSv::all();
        //$empresas = Documento::all();
        $empresa = Empresa::all();
        //dd($classeAquisicao, $empresas, $servico, $buscaSetor);

        // Adiciona a URL completa do arquivo
       // foreach ($empresas as $documento) {
       //     if ($documento->end_arquivo) {
       //         $documento->arquivo_url = Storage::url($documento->end_arquivo);
       //     }
       // }

        return view('aquisicao.incluir-aquisicao-material',  compact('tipoCategoriaMaterial', 'setor', 'buscaSetor', 'empresa'));
    }

    public function store(Request $request)
{
    $request->validate([
        'tipoMateriais' => 'required',
        'observacao' => 'required|string',
        'numero.*' => 'required|string',
        'valor.*' => 'required|numeric',
        'dt_inicial.*' => 'required|date',
        'arquivo.*' => 'nullable|file|mimes:pdf,doc,docx',
    ]);

    $today = Carbon::today()->format('Y-m-d');

    DB::beginTransaction();
    try {
        $solicitacao = SolMaterial::create([
            'id_tipo_material' => $request->tipoMateriais,
            'observacao' => $request->observacao,
            'data_cadastro' => $today,
            'status' => '1',
            'id_setor' => $request->idSetor,
        ]);

        foreach ($request->numero as $index => $numero) {
            $endArquivo = $request->hasFile('arquivo.' . $index)
                ? $request->file('arquivo.' . $index)->store('documentos', 'public')
                : null;

            Documento::create([
                'numero' => $numero,
                'dt_doc' => $today,
                'id_tp_doc' => '14',
                'valor' => $request->valor[$index],
                'id_empresa' => $request->razaoSocial[$index],
                'id_setor' => $request->input('idSetor'),
                'dt_validade' => $request->dt_final[$index],
                'end_arquivo' => $endArquivo,
                'id_sol_mat' => $solicitacao->id,
            ]);
        }

        DB::commit();
        return redirect('/gerenciar-aquisicao-material')->with('success', 'Solicitação e documentos salvos com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        report($e);
        return back()->withErrors(['error' => 'Ocorreu um erro ao salvar a solicitação.']);
    }
}


    public function edit($idS)
    {
        $buscaEmpresa = Empresa::all();
        $solicitacao = SolServico::findOrFail($idS);
        $documentos = Documento::where('id_sol_sv', $idS)->get();
        $tiposServico = CatalogoServico::where('id_cl_sv', $solicitacao->id_classe_sv)->get();
        $classeAquisicao = TipoClasseSv::all();
        $buscaSetor = Setor::all();

        // Adiciona a URL completa do arquivo
        foreach ($documentos as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('aquisicao.editar-aquisicao-servicos', compact('solicitacao', 'buscaEmpresa', 'documentos', 'classeAquisicao', 'buscaSetor', 'tiposServico'));
    }


    public function update(Request $request, $id)
{
    // Validação dos campos
    $request->validate([
        'classeSv' => 'required',
        'tipoServicos' => 'required',
        'motivo' => 'required|string',
        'numero.*' => 'required|string',
        'valor.*' => 'required|numeric',
        'dt_inicial.*' => 'required|date',
        'arquivo.*' => 'nullable|file|mimes:pdf,doc,docx',
        'arquivoOld.*' => 'nullable|file|mimes:pdf,doc,docx',
    ]);

    $setor = session()->get('usuario.setor')[0];

    DB::beginTransaction();
    try {
        // Encontrar a solicitação
        $solicitacao = SolServico::findOrFail($id);

        // Atualizar dados da solicitação
        $solicitacao->update([
            'id_classe_sv' => $request->input('classeSv'),
            'id_tp_sv' => $request->input('tipoServicos'),
            'motivo' => $request->input('motivo'),
        ]);

        // Atualizar os documentos existentes com novos arquivos (arquivoOld)
        if ($request->hasFile('arquivoOld')) {
            foreach ($request->file('arquivoOld') as $index => $file) {
                if ($file) {
                    // Obter caminho do arquivo
                    $path = $file->store('propostas', 'public');

                    // Atualizar o documento existente
                    $documento = Documento::find($request->input('documento_id')[$index]);
                    if ($documento) {
                        $documento->update([
                            'end_arquivo' => $path,
                        ]);
                    }
                }
            }
        }

        // Adicionar novos documentos (arquivo)
        if ($request->hasFile('arquivo') && is_array($request->file('arquivo'))) {
            foreach ($request->file('arquivo') as $index => $file) {
                if ($file) {
                    // Obter o caminho do arquivo
                    $path = $file->store('propostas', 'public');

                    // Criar um novo documento
                    $solicitacao->documentos()->create([
                        'end_arquivo' => $path,
                        'numero' => $request->input('numero')[$index],
                        'dt_doc' => $request->input('dt_inicial')[$index],
                        'valor' => $request->input('valor')[$index],
                        'id_empresa' => $request->input('razaoSocial')[$index],
                        'dt_validade' => $request->input('dt_final')[$index],
                        'id_tp_doc' => '14',
                        'id_setor' => $setor,
                    ]);
                }
            }
        }

        DB::commit();
        return redirect('/gerenciar-aquisicao-servicos')->with('success', 'Solicitação atualizada com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Ocorreu um erro ao atualizar a solicitação.']);
    }
}

    public function aprovar($idSolicitacao)
    {

        $aquisicao = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor'])
            ->where('id', $idSolicitacao)
            ->first();

        $numeros = range(1, 100); // Gera um array de 1 a 100

        $todosSetor = Setor::orderBy('nome')->get();

        $empresas = Documento::where('id_sol_sv', $idSolicitacao)->get();

        return view('aquisicao.aprovar-aquisicao-servicos', compact('aquisicao', 'numeros', 'todosSetor', 'empresas'));
    }

    public function validaAprovacao(Request $request)
    {
        // Obtém o valor do ID da solicitação
        $aquisicaoId = $request->input('solicitacao_id');

        // Busca a aquisição no banco de dados
        $aquisicao = SolServico::find($aquisicaoId);

        // Verifica se a aquisição foi encontrada
        if ($aquisicao) {
            // Atualiza o status e salva
            $aquisicao->status = $request->input('status');
            $aquisicao->prioridade = $request->input('prioridade');
            $aquisicao->save();


            return redirect('/gerenciar-aquisicao-servicos');
        }
    }
}
