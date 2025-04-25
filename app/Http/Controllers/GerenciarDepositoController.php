<?php

namespace App\Http\Controllers;

use App\Models\ModelDeposito;
use App\Models\ModelSala;
use App\Models\ModelTipoDeposito;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GerenciarDepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositos =  ModelDeposito::with(['tipoDeposito', 'sala'])->get();
        $tipoDeposito = ModelDeposito::all();
        $sala = ModelDeposito::all();


        return view('depositos.index', compact('depositos', 'tipoDeposito', 'sala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_deposito = ModelTipoDeposito::all();
        $sala = ModelSala::all();
        return view('depositos.create', compact('tipo_deposito', 'sala'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'tipo_deposito' => 'required|exists:tipo_deposito,id',

            // 👇 Aqui o truque: validação customizada no banco pgsql2
            'sala' => [
                'required',
                Rule::exists('pgsql2.salas', 'id'),
            ],

            'comprimento' => 'required|numeric|min:0.1',
            'largura' => 'required|numeric|min:0.1',
            'altura' => 'required|numeric|min:0.1',
            'largura_porta' => 'required|numeric|min:0.1',
            'altura_porta' => 'required|numeric|min:0.1',
            'capacidade' => 'required|numeric|min:0.1'
        ]);

        try {
            // Conversão de valores decimais (se usando vírgula no formulário)
            $data = $request->merge([
                'comprimento' => (float) str_replace(',', '.', $request->comprimento),
                'largura' => (float) str_replace(',', '.', $request->largura),
                'altura' => (float) str_replace(',', '.', $request->altura),
                'largura_porta' => (float) str_replace(',', '.', $request->largura_porta),
                'altura_porta' => (float) str_replace(',', '.', $request->altura_porta),
                'capacidade' => (float) str_replace(',', '.', $request->capacidade),
            ])->only([
                'nome', 'sigla', 'tipo_deposito', 'sala',
                'comprimento', 'largura', 'altura',
                'largura_porta', 'altura_porta', 'capacidade'
            ]);

            // Criação do registro
            $deposito = ModelDeposito::create([
                'nome' => $data['nome'],
                'sigla' => $data['sigla'],
                'tipo_deposito_id' => $data['tipo_deposito'],
                'sala_id' => $data['sala'],
                'comprimento' => $data['comprimento'],
                'largura' => $data['largura'],
                'altura' => $data['altura'],
                'largura_porta' => $data['largura_porta'],
                'altura_porta' => $data['altura_porta'],
                'capacidade' => $data['capacidade']
            ]);

            return redirect()->route('deposito.index')
                ->with('success', 'Depósito criado com sucesso!');

        } catch (\Exception $e) {
            // Log do erro para análise posterior
            app('flasher')->error('Erro ao criar depósito. Detalhes: ' . $e->getMessage());

            return back()->withInput()
                ->with('error', 'Erro ao criar depósito. Detalhes: ' . $e->getMessage());
        }
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
