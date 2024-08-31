<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\TipoUf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function Laravel\Prompts\select;

class CatalogoEmpresaController extends Controller
{

    public function index(Request $request)
    {

        $query = Empresa::with(['TipoUf']);

        if ($request->razaoSocial) {
            $query->where('razaosocial', $request->razaoSocial);
        }
        if ($request->nomeFantasia) {
            $query->where('nomefantasia', $request->nomeFantasia);
        }

        $empresa = $query->orderby('nomefantasia')->paginate(20);

        return view('empresa.catalogo-empresa', compact('empresa'));
    }

    public function create()
    {

        $uf = TipoUf::all();


        return view('empresa.incluir-empresa');
    }

    public function store(Request $request)
    {



    }
}
