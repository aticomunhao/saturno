<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function Laravel\Prompts\select;

class CatalogoEmpresaController extends Controller
{

    public function index(Request $request)
    {



        return view('empresa.catalogo-empresa');
    }

    public function create()
    {



        return view('empresa.incluir-empresa');
    }

    public function store(Request $request)
    {



    }
}
