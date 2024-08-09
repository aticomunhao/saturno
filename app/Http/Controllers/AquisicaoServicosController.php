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

    public function index()
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

            )
            ->get();

        $classeAquisicao = DB::table('tipo_classe_sv')
            ->select(
                'tipo_classe_sv.id AS idClasse',
                'tipo_classe_sv.descricao AS descricaoClasse',
                'tipo_classe_sv.sigla',
            )
            ->get();


        return view('aquisicao.gerenciar-aquisicao-servicos',  compact('aquisicao', 'classeAquisicao'));
    }

    public function retornaNomeServicos($id)
    {
        $nomeServicos = DB::table('catalogo_servico')
            ->where('id_cl_sv', $id)
            ->get();


        // dd($cidadeDadosResidenciais);

        return response()->json($nomeServicos);
    }
}
