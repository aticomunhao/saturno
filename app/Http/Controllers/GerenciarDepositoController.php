<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;

class GerenciarDepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositos =  Deposito::with(['tipoDeposito', 'sala'])->get();
        $tipoDeposito = Deposito::all();
        $sala = Deposito::all();
        return view('depositos.index', compact('depositos', 'tipoDeposito', 'sala'));
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
