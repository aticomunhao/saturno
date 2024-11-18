<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValorCompra;


use function Laravel\Prompts\select;

class ValorCompraController extends Controller
{

    public function index(Request $request)
    {
        // Verifica e atualiza valorServDIADM
        if ($request->input('valorServDIADM') != null) {
            $existingRecord = ValorCompra::where('tipo_sol', 1)
                ->where('tipo_compra', 1)
                ->whereNull('dt_fim') // Busca registros sem 'dt_fim'
                ->first();

            if (!$existingRecord || $existingRecord->valor != $request->input('valorServDIADM')) {
                // Atualiza o 'dt_fim' do registro existente, se necessário
                if ($existingRecord) {
                    $existingRecord->update(['dt_fim' => now()]);
                }

                // Insere um novo registro
                ValorCompra::create([
                    'valor' => $request->input('valorServDIADM'),
                    'tipo_sol' => 1,
                    'tipo_compra' => 1,
                    'dt_inicio' => now(),
                ]);
            }
        }

        // Verifica e atualiza valorMatDIADM
        if ($request->input('valorMatDIADM') != null) {
            $existingRecord = ValorCompra::where('tipo_sol', 2)
                ->where('tipo_compra', 1)
                ->whereNull('dt_fim') // Busca registros sem 'dt_fim'
                ->first();

            if (!$existingRecord || $existingRecord->valor != $request->input('valorMatDIADM')) {
                // Atualiza o 'dt_fim' do registro existente, se necessário
                if ($existingRecord) {
                    $existingRecord->update(['dt_fim' => now()]);
                }

                // Insere um novo registro
                ValorCompra::create([
                    'valor' => $request->input('valorMatDIADM'),
                    'tipo_sol' => 2,
                    'tipo_compra' => 1,
                    'dt_inicio' => now(),
                ]);
            }
        }

        // Verifica e atualiza valorServ
        if ($request->input('valorServ') != null) {
            $existingRecord = ValorCompra::where('tipo_sol', 1)
                ->where('tipo_compra', 2)
                ->whereNull('dt_fim') // Busca registros sem 'dt_fim'
                ->first();

            if (!$existingRecord || $existingRecord->valor != $request->input('valorServ')) {
                // Atualiza o 'dt_fim' do registro existente, se necessário
                if ($existingRecord) {
                    $existingRecord->update(['dt_fim' => now()]);
                }

                // Insere um novo registro
                ValorCompra::create([
                    'valor' => $request->input('valorServ'),
                    'tipo_sol' => 1,
                    'tipo_compra' => 2,
                    'dt_inicio' => now(),
                ]);
            }
        }

        // Verifica e atualiza valorMat
        if ($request->input('valorMat') != null) {
            $existingRecord = ValorCompra::where('tipo_sol', 1)
                ->where('tipo_compra', 2)
                ->whereNull('dt_fim') // Busca registros sem 'dt_fim'
                ->first();

            if (!$existingRecord || $existingRecord->valor != $request->input('valorMat')) {
                // Atualiza o 'dt_fim' do registro existente, se necessário
                if ($existingRecord) {
                    $existingRecord->update(['dt_fim' => now()]);
                }

                // Insere um novo registro
                ValorCompra::create([
                    'valor' => $request->input('valorMat'),
                    'tipo_sol' => 1,
                    'tipo_compra' => 2,
                    'dt_inicio' => now(),
                ]);
            }
        }

        return view('valorCompra.valor-compra');
    }
}
