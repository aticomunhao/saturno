<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolServico;
use App\Models\TipoClasseSv;


use function Laravel\Prompts\select;

class CatalogoServicoController extends Controller
{

    public function index(Request $request)
{
    $query = TipoClasseSv::with('catalogoServico');

    // Aplicar filtros se forem fornecidos
    if ($request->classe) {
        $query->where('id', $request->classe);
    }

    $aquisicao = $query->orderBy('descricao')->paginate(20);

    //dd($aquisicao);

    // Pegar todas as classes e os serviços
    $classeAquisicao = TipoClasseSv::all();

    return view('servico.catalogo-servico', compact('aquisicao', 'classeAquisicao'));
}

}
