<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


use function Laravel\Prompts\select;

class ValorCompraController extends Controller
{

    public function index(Request $request)
    {

        $valorDIADM = $request->input('valorMaxDIADM');
        $valor3Propostas = $request->input('valorMax');


        return view('valorCompra.valor-compra');
    }
}
