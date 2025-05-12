<?php

namespace App\Http\Controllers;

use App\Models\GerenciarMovimentacaoFisica;
use Illuminate\Http\Request;
use App\Models\ModelCadastroInicial;
use App\Models\ModelMovimentacaoFisica;
use App\Models\ModelTipoDeposito;

class GerenciarMovimentacaoFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $movimentacoes_fisicas = ModelMovimentacaoFisica::with([
        'cadastro_inicial',
        'remetente',
        'destinatario',
        'deposito_origem',
        'deposito_destino',
        'tipo_movimento'
        ])->get();

        $tipos_deposito = ModelTipoDeposito::all();

    return view('movimentacao-fisica.index', compact('movimentacoes_fisicas', 'tipos_deposito'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(GerenciarMovimentacaoFisica $gerenciarMovimentacaoFisica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GerenciarMovimentacaoFisica $gerenciarMovimentacaoFisica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GerenciarMovimentacaoFisica $gerenciarMovimentacaoFisica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GerenciarMovimentacaoFisica $gerenciarMovimentacaoFisica)
    {
        //
    }
}
