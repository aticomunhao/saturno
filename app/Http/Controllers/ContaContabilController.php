<?php

namespace App\Http\Controllers;

use App\Models\TipoClasseContaContabil;
use App\Models\TipoGrupoContaContabil;
use Illuminate\Http\Request;
use App\Models\ContaContabil;
use App\Models\TipoCatalogoContaContabil;
use App\Models\TipoNaturezaContaContabil;

class ContaContabilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas_contabeis = ContaContabil::with(
            'natureza_contabil',
            'catalogo_contabil',
            'grupo_contabil',
            'classe_contabil'
        )->get();
        $contador_contabil = ContaContabil::count();

        return view("contas.index", compact("contas_contabeis"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $numeros = [];
        for ($i = 0; $i <= 100; $i++) {
            $numeros[] = $i;
        }
        $catalogo_conta_contabil = TipoCatalogoContaContabil::all();
        $natureza_conta_contabil = TipoNaturezaContaContabil::all();
        $classe_conta_contabil = TipoClasseContaContabil::all();
        $grupo_conta_contabil = TipoGrupoContaContabil::all();


        return view("contas.create", compact("numeros", "catalogo_conta_contabil", "classe_conta_contabil", "grupo_conta_contabil", "natureza_conta_contabil"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
