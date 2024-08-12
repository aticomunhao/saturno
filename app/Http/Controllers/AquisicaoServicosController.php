<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelPagamentos;
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
                'catalogo_servico.descricao AS descricaoCatalogo'

            );

            $status_servico = $request->status_servico;
            $classe_servico = $request->classe;
            $tipo_servico = $request->servicos;
            dd($classe_servico, $tipo_servico);

            if ($request->status_servico) {
                $aquisicao->where('sol_servico.status', $status_servico);
            }
            if ($request->classe) {
                $aquisicao->where('idClasseSv', $classe_servico);
            }
            if ($request->servicos) {
                $aquisicao->where('idNomeSv', $tipo_servico);
            }

            $aquisicao = $aquisicao->orderBy('idSolicitacao')->paginate(20);

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


        return view('aquisicao.gerenciar-aquisicao-servicos',  compact('aquisicao', 'classeAquisicao', 'status'));
    }

    public function retornaNomeServicos($id)
    {
        $nomeServicos = DB::table('catalogo_servico')
            ->where('id_cl_sv', $id)
            ->get();


        // dd($cidadeDadosResidenciais);

        return response()->json($nomeServicos);
    }

    public function create()
    {
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



        return view('aquisicao.incluir-aquisicao-servicos',  compact('servico', 'classeAquisicao'));
    }

    public function store($request)
    {
        $solServicos = DB::table('sol_servico')
            ->include(
                $request->input
            );
    }
}
