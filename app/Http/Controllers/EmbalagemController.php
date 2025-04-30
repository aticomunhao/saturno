<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEmbalagem;
use App\Models\ModelUnidadeMedida;
use Illuminate\Support\Facades\DB;

class EmbalagemController extends Controller
{
    public function index()
    {

        return view('/embalagem/gerenciar-embalagem');
    }
    public function indexCad()
    {

        $result = ModelUnidadeMedida::where('tipo', 2)->get();

        return view('/embalagem/cad-embalagem', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        return view('/embalagem/gerenciar-embalagem');
    }
    public function storeCad(Request $request)
    {
        ModelUnidadeMedida::Create([
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla'),
            'ativo' => 1,
            'tipo' => 2,
        ]);

        $result = ModelUnidadeMedida::where('tipo', 2)->get();

        return view('/embalagem/cad-embalagem', compact('result'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

    }

    public function updateCad(Request $request, $id)
    {

    }


    public function deleteCad($id)
    {

    }
}
