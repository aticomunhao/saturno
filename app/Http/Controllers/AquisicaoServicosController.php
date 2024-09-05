<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatalogoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolServico;
use App\Models\TipoClasseSv;
use App\Models\TipoStatusSolSv;
use App\Models\Setor;
use App\Models\Documento;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;


use function Laravel\Prompts\select;

class AquisicaoServicosController extends Controller
{

    public function index(Request $request)
    {

        $query = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor']);

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

        $status = TipoStatusSolSv::all();
        $classeAquisicao = TipoClasseSv::all();



        return view('aquisicao.gerenciar-aquisicao-servicos', compact('aquisicao', 'classeAquisicao', 'status'));
    }

    public function retornaNomeServicos($idClasse)
    {
        $servicos = DB::table('catalogo_servico')
            ->where('id_cl_sv', $idClasse)
            ->select('id', 'descricao')
            ->get();


        // dd($cidadeDadosResidenciais);

        return response()->json($servicos);
    }

    public function create(Request $request)
    {

        $setor = session()->get('usuario.setor', 'cpf');

        //dd($setor);

        $buscaSetor = Setor::whereIn('id', $setor)->get();
        $servico = SolServico::all();
        $classeAquisicao = TipoClasseSv::all();
        $empresas = Documento::all();
        $buscaEmpresa = Empresa::all();
        //dd($classeAquisicao, $empresas, $servico, $buscaSetor);

        // Adiciona a URL completa do arquivo
        foreach ($empresas as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('aquisicao.incluir-aquisicao-servicos',  compact('servico', 'classeAquisicao', 'setor', 'buscaSetor', 'buscaEmpresa', 'empresas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'classeSv' => 'required',
        'tipoServicos' => 'required',
        'motivo' => 'required|string',
        'numero.*' => 'required|string',
        'valor.*' => 'required|numeric',
        'dt_inicial.*' => 'required|date',
        'arquivo.*' => 'nullable|file|mimes:pdf,doc,docx',
    ]);

    $today = Carbon::today()->format('Y-m-d');
    $setor = session()->get('usuario.setor')[0];

    DB::beginTransaction();
    try {
        $solicitacao = SolServico::create([
            'id_classe_sv' => $request->classeSv,
            'id_tp_sv' => $request->tipoServicos,
            'motivo' => $request->motivo,
            'data' => $today,
            'status' => '1',
            'id_setor' => $request->idSetor,
        ]);

        foreach ($request->numero as $index => $numero) {
            $endArquivo = $request->hasFile('arquivo.' . $index)
                ? $request->file('arquivo.' . $index)->store('documentos', 'public')
                : null;

            $solicitacao->documentos()->create([
                'numero' => $numero,
                'dt_doc' => $request->dt_inicial[$index],
                'id_tp_doc' => '14',
                'valor' => $request->valor[$index],
                'id_empresa' => $request->razaoSocial[$index],
                'id_setor' => $setor,
                'dt_validade' => $request->dt_final[$index],
                'end_arquivo' => $endArquivo,
            ]);
        }

        DB::commit();
        return redirect('/gerenciar-aquisicao-servicos')->with('success', 'Solicitação e documentos salvos com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Ocorreu um erro ao salvar a solicitação.']);
    }
}


    public function edit($idS)
    {
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

        return view('aquisicao.editar-aquisicao-servicos', compact('solicitacao', 'documentos', 'classeAquisicao', 'buscaSetor', 'tiposServico'));
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
