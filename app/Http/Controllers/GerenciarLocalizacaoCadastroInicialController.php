<?php

namespace App\Http\Controllers;

use App\Models\ModelCadastroInicial;
use App\Models\ModelLocalizacaoCadastroInicial;
use App\Models\ModelSetor;
use Illuminate\Http\Request;

class GerenciarLocalizacaoCadastroInicialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimentacao_cadastro_incicial= ModelLocalizacaoCadastroInicial::with([
        'cadastroInicial',
        'remetente',
        'destinatario',
        'depositoOrigem',
        'depositoDestino'])->get();
        return view('localizacao-cadastro-inicial.index', compact('movimentacao_cadastro_incicial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = ModelSetor::all();
        // dd($setores);

        return view('localizacao-cadastro-inicial.create', compact('setores'));
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

    public function solicitar_teste_material(){
        $setores_para_teste = ModelSetor::where('testa_material', true)->get();
    //    dd($setores_para_teste);
        $cadastro_inicial =  ModelCadastroInicial::with('Status',
        'SolOrigem',
        'DocOrigem',
        'Deposito',
        'Destinacao',
         'CategoriaMaterial',
         'TipoMaterial',
         'ItemCatalogoMaterial',
         'Localizacao')->whereDoesntHave('Localizacao')->get();
// dd($cadastro_inicial);
        return view('localizacao-cadastro-inicial.solicitar-teste', compact('setores_para_teste', 'cadastro_inicial'));
    }
}
