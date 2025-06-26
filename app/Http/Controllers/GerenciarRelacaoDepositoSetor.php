<?php

namespace App\Http\Controllers;

use App\Models\ModelDeposito;
use Illuminate\Http\Request;
use App\Models\ModelRelDepositoSetor;
use App\Models\ModelSetor;
use Carbon\Carbon;

class GerenciarRelacaoDepositoSetor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relacoes_deposito_setor = ModelRelDepositoSetor::with(['Deposito', 'Setor'])->get();
        // dd($relacoes_deposito_setor);
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
        // $depositos = ModelDeposito::with('relacaoDepositoSetor')->get();
        $depositos = ModelDeposito::doesntHave('relacaoDepositoSetor')
            ->get();

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
        $relacao->dt_inicio = Carbon::now();
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
        $relacao = ModelRelDepositoSetor::findOrFail($id);
        $deposito_banco = $relacao->Deposito;
        // dd($deposito);
        $setores = ModelSetor::all();
        $setor_banco =  $relacao->Setor;
        // $depositos = ModelDeposito::doesntHave('relacaoDepositoSetor')
        //     ->get();

        return view('relacao-deposito-setor.edit', compact('relacao', 'setores', 'deposito_banco', 'setor_banco'));
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
