<?php

namespace App\Http\Controllers;

use App\Models\ModelDeposito;
use Illuminate\Http\Request;
use App\Models\ModelRelDepositoSetor;
use App\Models\ModelSetor;

class GerenciarRelacaoDepositoSetor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relacoes_deposito_setor = ModelRelDepositoSetor::with(['Deposito', 'Setor'])->get();
        $setores = ModelSetor::all();
        $depositos = ModelDeposito::all();
        return view('relacao-deposito-setor.index', compact('relacoes_deposito_setor', 'setores', 'depositos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = ModelSetor::all();
        $depositos = ModelDeposito::whith();
        // dd($setores, $depositos);
        return view('relacao-deposito-setor.create', compact('setores', 'depositos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            // 'setor_id' => 'required|exists:setores,id',
            // 'deposito_id' => 'required|exists:depositos,id',
        ]);
        $relacao = new ModelRelDepositoSetor();
        $relacao->id_setor = $request->input('setor_id');
        $relacao->id_deposito = $request->input('deposito_id');
        $relacao->save();

        return redirect()->route('relacao-deposito-setor.index')->with('success', 'Relação Depósito/Setor criada com sucesso!');
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
