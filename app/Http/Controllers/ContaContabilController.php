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
        $validatedData = $request->validate([
            'id_tipo_catalogo' => 'required|exists:tipo_catalogo_conta_contabil,id',
            'descricao' => 'required|string|max:255',
            'id_tipo_natureza_conta_contabil' => 'required|exists:tipo_natureza_conta_contabil,id',
            'id_tipo_grupo_conta_contabil' => 'required|exists:tipo_grupo_conta_contabil,id',
            'grau' => 'required|integer|between:1,6',
            'nivel_1' => 'required|integer|between:1,99',
            'nivel_2' => 'nullable|integer|between:1,99',
            'nivel_3' => 'nullable|integer|between:1,99',
            'nivel_4' => 'nullable|integer|between:1,99',
            'nivel_5' => 'nullable|integer|between:1,99',
            'nivel_6' => 'nullable|integer|between:1,99',
        ]);

        if (ContaContabil::hasDuplicateLevels($request)) {
            app('flasher')->addError('Já existe uma conta Contabil com esse registro');
            return redirect()->back();
        }

        ContaContabil::create([
            'id_tipo_catalogo' => $request->input('id_tipo_catalogo'),
            'descricao' => $request->input('descricao'),
            'id_tipo_natureza_conta_contabil' => $request->input('id_tipo_natureza_conta_contabil'),
            'id_tipo_grupo_conta_contabil' => $request->input('id_tipo_grupo_conta_contabil'),
            'grau' => $request->input('grau'),
            'nivel_1' => $request->input('nivel_1'),
            'nivel_2' => $request->input('nivel_2'),
            'nivel_3' => $request->input('nivel_3'),
            'nivel_4' => $request->input('nivel_4'),
            'nivel_5' => $request->input('nivel_5'),
            'nivel_6' => $request->input('nivel_6'),
        ]);

        app('flasher')->addSaved("Conta Contabil Gerada com Sucesso.");
        return redirect()->route('conta-contabil.index');
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
    public function edit($id)
    {
        $contaContabil = ContaContabil::with([
            'natureza_contabil',
            'catalogo_contabil',
            'grupo_contabil',
            'classe_contabil'
        ])->findOrFail($id);
        dd($contaContabil->first());
        return view('contas.edit', compact('contaContabil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_tipo_catalogo' => 'required|exists:tipo_catalogo_conta_contabil,id',
            'descricao' => 'required|string|max:255',
            'id_tipo_natureza_conta_contabil' => 'required|exists:tipo_natureza_conta_contabil,id',
            'id_tipo_grupo_conta_contabil' => 'required|exists:tipo_grupo_conta_contabil,id',
            'grau' => 'required|integer|between:1,6',
            'nivel_1' => 'required|integer|between:1,99',
            'nivel_2' => 'nullable|integer|between:1,99',
            'nivel_3' => 'nullable|integer|between:1,99',
            'nivel_4' => 'nullable|integer|between:1,99',
            'nivel_5' => 'nullable|integer|between:1,99',
            'nivel_6' => 'nullable|integer|between:1,99',
        ]);

        // Verifica se já existe um registro com os mesmos níveis, excluindo o atual
        $duplicate = ContaContabil::where('nivel_1', $request->input('nivel_1'))
            ->where('nivel_2', $request->input('nivel_2'))
            ->where('nivel_3', $request->input('nivel_3'))
            ->where('nivel_4', $request->input('nivel_4'))
            ->where('nivel_5', $request->input('nivel_5'))
            ->where('nivel_6', $request->input('nivel_6'))
            ->where('id', '!=', $id)
            ->exists();

        if ($duplicate) {
            app('flasher')->addError('Já existe uma conta Contabil com esse registro');
            return redirect()->back();
        }

        $contaContabil = ContaContabil::findOrFail($id);
        $contaContabil->update($validatedData);

        app('flasher')->addSaved("Conta Contabil atualizada com sucesso.");
        return redirect()->route('conta-contabil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
