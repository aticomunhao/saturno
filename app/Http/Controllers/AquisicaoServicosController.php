<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ModelBuscaSetor;
use App\Models\ModelVendas;
use Facade\Ignition\DumpRecorder\Dump;
use phpDocumentor\Reflection\Types\Float_;
use PhpParser\Node\Stmt\ElseIf_;
use Psy\VarDumper\Dumper;
use Symfony\Component\Console\Helper\Dumper as HelperDumper;


class AquisicaoServicosController extends Controller
{

    public function index(Request $request)
    {


        $aquisicao = DB::table('sol_servico')
            ->leftJoin('tipo_classe_sv', 'sol_servico.id_classe_sv', 'tipo_classe_sv.id')
            ->leftJoin('catalogo_servico', 'catalogo_servico.id', 'sol_servico.id_tp_sv')
            ->leftJoin('tipo_status_sol_sv', 'sol_servico.status', 'tipo_status_sol_sv.id')
            ->select(
                'sol_servico.id AS idSolicitacao',
                'sol_servico.data AS dataSolicitacao',
                'sol_servico.id_setor AS idSetor',
                'sol_servico.id_classe_sv AS idClasseSv',
                'sol_servico.id_tp_sv AS idNomeSv',
                'sol_servico.motivo AS motivoServico',
                'sol_servico.prioridade AS prioridadeServico',
                'sol_servico.status AS statusServico',
                'catalogo_servico.id AS idCatalogo',
                'tipo_classe_sv.id AS idClasse',
                'catalogo_servico.descricao AS descricaoCatalogo',
                'tipo_status_sol_sv.nome AS nomeStatus',
            );


        $status_servico = $request->status_servico;
        $classe_servico = $request->classe;
        $tipo_servico = $request->servicos;
        //dd($classe_servico, $tipo_servico);

        if ($request->status_servico) {
            $aquisicao->where('sol_servico.status', $status_servico);
        }
        if ($request->classe) {
            $aquisicao->where('sol_servico.id_classe_sv', $classe_servico);
        }
        if ($request->servicos) {
            $aquisicao->where('sol_servico.id_tp_sv', $tipo_servico);
        }

        $aquisicao = $aquisicao->orderBy('idSolicitacao')->paginate(20);

        foreach ($aquisicao as $key => $teste) {
            $valorSetor = DB::connection('pgsql2')->table('setor')
            ->where('setor.id', $teste->idSetor)
            ->select('setor.id', 'setor.nome')
            ->get();

            $teste->setorTeste = $valorSetor;
        }

        //dd($aquisicao);

        $status = DB::table('tipo_status_sol_sv')
            ->select(
                'tipo_status_sol_sv.id AS idStatus',
                'tipo_status_sol_sv.nome AS nomeStatus',
            )
            ->get();

        $classeAquisicao = DB::table('tipo_classe_sv')
            ->select(
                'tipo_classe_sv.id AS idClasse',
                'tipo_classe_sv.descricao AS descricaoClasse',
                'tipo_classe_sv.sigla',
            )
            ->get();

        //$teste = session()->all();
        //dd($teste);


        return view('aquisicao.gerenciar-aquisicao-servicos',  compact('aquisicao', 'classeAquisicao', 'status'));
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

    public function create()
    {

        $setor = session()->get('usuario.setor');

        $buscaSetor = DB::connection('pgsql2')->table('setor')
            ->select(
                'setor.id',
                'setor.nome'
            )
            ->where('setor.id', $setor)
            ->get();

        $servico = DB::table('sol_servico')
            ->select(
                'sol_servico.id AS idSolicitacao',
                'sol_servico.data AS dataSolicitacao',
                'sol_servico.id_setor AS idSetor',
                'sol_servico.id_classe_sv AS idClasseSv',
                'sol_servico.id_tp_sv AS idNomeSv',
                'sol_servico.motivo AS motivoServico',
                'sol_servico.prioridade AS prioridadeServico',
                'sol_servico.status AS statusServico',
            );

        $classeAquisicao = DB::table('tipo_classe_sv')
            ->select(
                'tipo_classe_sv.id AS idClasse',
                'tipo_classe_sv.descricao AS descricaoClasse',
                'tipo_classe_sv.sigla',
            )
            ->get();

        return view('aquisicao.incluir-aquisicao-servicos',  compact('servico', 'classeAquisicao', 'setor', 'buscaSetor'));
    }

    public function store(Request $request)
    {

        $today = Carbon::today()->format('Y-m-d');


        DB::table('sol_servico')
            ->insert([
                'id_classe_sv' => $request->input('classeSv'),
                'id_tp_sv' => $request->input('tipoServicos'),
                'motivo' => $request->input('motivo'),
                'data' => $today,
                'status' => '1',
                'id_setor' => $request->input('idSetor'),
            ]);


        return redirect('/gerenciar-aquisicao-servicos');
    }
}
