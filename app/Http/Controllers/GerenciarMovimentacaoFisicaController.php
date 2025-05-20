<?php

namespace App\Http\Controllers;

use App\Models\GerenciarMovimentacaoFisica;
use Illuminate\Http\Request;
use App\Models\ModelCadastroInicial;
use App\Models\ModelMovimentacaoFisica;
use App\Models\ModelTipoDeposito;
use Illuminate\Database\Eloquent\Model;

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
        // dd($movimentacoes_fisicas);

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
    public function solicitar_teste(){

     $cadastro_inicial = ModelCadastroInicial::with('Status', 'SolOrigem', 'DocOrigem', 'Deposito', 'Destinacao', 'CategoriaMaterial', 'TipoMaterial')->get();
    //   dd($cadastro_inicial);
        return view('movimentacao-fisica.solicitar-teste', compact('cadastro_inicial'));

    }
    public function solicitar_teste_confere(Request $request){
    //  $ids = $request->input('materiais1');
//   dd($request->input('materiais1'));
        $ids = $request->all()['materiais1'];
        if(!$ids){
            app('flasher')->addError('Selecione pelo menos um material para continuar.');
            return redirect()->back();
        }

    $materiais_enviados = ModelCadastroInicial::with([
        'Status',
        'SolOrigem',
        'DocOrigem',
        'Deposito',
        'Destinacao',
        'CategoriaMaterial',
        'TipoMaterial'
        ])->whereIn('id', $request->input('materiais1'))->get();
        // dd($materiais_enviados);

        return view('movimentacao-fisica.solicitar-teste-confere', compact('materiais_enviados'));

    }
    public function solicitar_teste_store(Request $request){
        dd($request->all());

    }

}
