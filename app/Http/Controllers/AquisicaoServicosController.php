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

        // Adiciona a URL completa do arquivo
        foreach ($empresas as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('aquisicao.incluir-aquisicao-servicos',  compact('servico', 'classeAquisicao', 'setor', 'buscaSetor', 'empresas'));
    }

    public function store(Request $request)
    {
        $today = Carbon::today()->format('Y-m-d');
        $setor = session()->get('usuario.setor')[0];


        $idSolicitacao = SolServico::create([
            'id_classe_sv' => $request->input('classeSv'),
            'id_tp_sv' => $request->input('tipoServicos'),
            'motivo' => $request->input('motivo'),
            'data' => $today,
            'status' => '1',
            'id_setor' => $request->input('idSetor'),
        ]);

        foreach ($request->numero as $index => $numero) {

            // Verificar se um arquivo foi carregado
            if ($request->hasFile('arquivo.' . $index)) {
                $arquivo = $request->file('arquivo.' . $index);
                $endArquivo = $arquivo->store('documentos', 'public');
            } else {
                $endArquivo = null;
            }

            Documento::create([
                'numero' => $numero,
                'dt_doc' => $request->dt_inicial[$index],
                'id_tp_doc' => '14',
                'valor' => $request->valor[$index],
                'id_empresa' => $request->razaoSocial[$index],
                'id_setor' => $setor,
                'id_sol_sv' => $idSolicitacao->id,
                'dt_validade' => $request->dt_final[$index],
                'end_arquivo' => $endArquivo,
            ]);
        }
        return redirect('/gerenciar-aquisicao-servicos')->with('success', 'Solicitação e documentos salvos com sucesso!');
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
    $solicitacao = SolServico::findOrFail($id);
    $setor = session()->get('usuario.setor')[0];

    // Atualizar dados da solicitação
    $solicitacao->update([
        'id_classe_sv' => $request->input('classeSv'),
        'id_tp_sv' => $request->input('tipoServicos'),
        'motivo' => $request->input('motivo'),
    ]);
    //dd($request->all());

    // Verificar se 'arquivoOld' está presente e não é nulo
    if ($request->hasFile('arquivoOld')) {
        foreach ($request->file('arquivoOld') as $index => $file) {
            if ($file) {
                // Salvar o arquivo e obter o caminho
                $path = $file->store('propostas', 'public');

                // Atualizar o caminho do arquivo na base de dados
                $documento = Documento::find($request->input('documento_id')[$index]);
                if ($documento) {
                    $documento->end_arquivo = $path;
                    $documento->save();
                }
            }
        }
    }

    // Verificar se 'arquivo' está presente e não é nulo
    if ($request->hasFile('arquivo') && is_array($request->file('arquivo'))) {
        foreach ($request->file('arquivo') as $index => $file) {
            if ($file) {
                // Salvar o arquivo e obter o caminho
                $path = $file->store('propostas', 'public');

                // Criar um novo documento com os dados correspondentes
                Documento::create([
                    'end_arquivo' => $path,
                    'numero' => $request->input('numero')[$index],
                    'dt_doc' => $request->input('dt_inicial')[$index],
                    'valor' => $request->input('valor')[$index],
                    'id_empresa' => $request->input('razaoSocial')[$index],
                    'dt_validade' => $request->input('dt_final')[$index],
                    'id_tp_doc' => '14',
                    'id_setor' => $setor,
                    'id_sol_sv' => $id,
                ]);
            }
        }
    }

    return redirect('/gerenciar-aquisicao-servicos');
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
