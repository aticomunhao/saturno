<?php

namespace App\Http\Controllers;

use App\Models\TipoClasseContaContabil;
use App\Models\TipoGrupoContaContabil;
use Illuminate\Http\Request;
use App\Models\ContaContabil;
use App\Models\TipoCatalogoContaContabil;
use App\Models\TipoNaturezaContaContabil;
use Carbon\Carbon;

class ContaContabilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $contas_contabeis = ContaContabil::with(
            'natureza_contabil',
            'catalogo_contabil',
            'grupo_contabil',
            'classe_contabil'
        );

        // Parte dos campos estrangeiros para pesquisa.
        $grupos_contabeis = TipoGrupoContaContabil::all();
        $naturezas_contabeis = TipoNaturezaContaContabil::all();
        $catalogos_contabeis = TipoCatalogoContaContabil::all();
        $classes_contabeis = TipoClasseContaContabil::all();

        // Contador de Contas Contábeis
        $contador_contabil_conta_contabil = ContaContabil::count();

        // Campos para pesquisa
        $pesquisa_descricao = $request->input('descricao');
        $pesquisa_grupo_contabil = $request->input('grupo_contabil');
        $pesquisa_natureza_contabil = $request->input('natureza_contabil');
        $pesquisa_catalogo_contabil = $request->input('catalogo_contabil');
        $pesquisa_classe_contabil = $request->input('classe_contabil');


        // Pesquisa
        if ($pesquisa_descricao !== null) {
            $contas_contabeis->where('descricao', 'like', '%' . $pesquisa_descricao . '%');
        }

        if (!empty($pesquisa_grupo_contabil)) {
            $contas_contabeis->where('id_tipo_grupo_conta_contabil', $pesquisa_grupo_contabil);
        }

        if (!empty($pesquisa_natureza_contabil)) {
            $contas_contabeis->where('id_tipo_natureza_conta_contabil', $pesquisa_natureza_contabil);
        }


        if (!empty($pesquisa_catalogo_contabil)) {
            $contas_contabeis->where('id_tipo_catalogo', $pesquisa_catalogo_contabil);
        }

        if (!empty($pesquisa_classe_contabil)) {
            $contas_contabeis->where('id_tipo_classe_conta_contabil', $pesquisa_classe_contabil);
        }

        if (!empty($pesquisa_nivel_1)) {
            $contas_contabeis->where('nivel_1', $pesquisa_nivel_1);
        }

        if (!empty($pesquisa_nivel_2)) {
            $contas_contabeis->where('nivel_2', $pesquisa_nivel_2);
        }

        if (!empty($pesquisa_nivel_3)) {
            $contas_contabeis->where('nivel_3', $pesquisa_nivel_3);
        }


        if (!empty($pesquisa_nivel_4)) {
            $contas_contabeis->where('nivel_4', $pesquisa_nivel_4);
        }

        if (!empty($pesquisa_nivel_5)) {
            $contas_contabeis->where('nivel_5', $pesquisa_nivel_5);
        }

        if (!empty($pesquisa_nivel_6)) {
            $contas_contabeis->where('nivel_6', $pesquisa_nivel_6);
        }

        // Agora execute a consulta

        $numeros = range(1, 100);
        $contas_contabeis =  $contas_contabeis->get();
        // Para debug:
        // dd($contas_contabeis->toSql(), $contas_contabeis->getBindings());
        return view("contas.index", compact(
            "contas_contabeis",
            "grupos_contabeis",
            "naturezas_contabeis",
            "catalogos_contabeis",
            "classes_contabeis",
            "numeros",
        ));
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
            'data_inicio' => Carbon::now()->toDateString(),
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

        $numeros = [];
        for ($i = 0; $i <= 100; $i++) {
            $numeros[] = $i;
        }
        $catalogo_conta_contabil = TipoCatalogoContaContabil::all();
        $natureza_conta_contabil = TipoNaturezaContaContabil::all();
        $classe_conta_contabil = TipoClasseContaContabil::all();
        $grupo_conta_contabil = TipoGrupoContaContabil::all();
        $contaContabil = ContaContabil::with([
            'natureza_contabil',
            'catalogo_contabil',
            'grupo_contabil',
            'classe_contabil'
        ])->findOrFail($id);

        return view('contas.edit', compact('contaContabil', 'grupo_conta_contabil', 'classe_conta_contabil', 'natureza_conta_contabil', 'catalogo_conta_contabil'));
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
        $contaContabil->update([
            'data_inicio' => Carbon::now()->toDateString(),
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

    public function inativar(string $id)
    {
        $contaContabil = ContaContabil::findOrFail($id);
        $contaContabil->update([
            'data_fim' => Carbon::now()->toDateString(),
        ]);
        return redirect()->route('conta-contabil.index');
    }
}
