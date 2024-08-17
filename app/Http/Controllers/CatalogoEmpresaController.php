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

use function Laravel\Prompts\select;

class CatalogoEmpresaController extends Controller
{

    public function index(Request $request)
    {

        $empresas = DB::table('documento AS doc')
        ->select(
            'doc.numero',
            'doc.dt_doc',
            'doc.id_tp_doc',
            'doc.valor',
            'doc.id_empresa',
            'doc.id_setor',
            'doc.vencedor',
            'doc.id_sol_sv',
            'doc.dt_validade',
            'doc.end_arquivo'
        )
        ->get();



        return view('empresa.catalogo-empresa');
    }
    public function store(Request $request)
    {
       $documentos = [
            'doc.numero' => $request->input('numeroProposta'),
            'doc.dt_doc',
            'doc.id_tp_doc',
            'doc.valor',
            'doc.id_empresa',
            'doc.id_setor',
            'doc.vencedor',
            'doc.id_sol_sv',
            'doc.dt_validade',
            'doc.end_arquivo'
       ];

       
    }
}
