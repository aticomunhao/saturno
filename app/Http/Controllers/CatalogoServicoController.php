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
    $query = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor']);

    // Aplicar filtros se forem fornecidos
    if ($request->classe) {
        $query->where('id_classe_sv', $request->classe);
    }
    if ($request->servicos) {
        $query->where('id_tp_sv', $request->servicos);
    }

    $aquisicao = $query->orderBy('id')->paginate(20);

    // Pegar todas as classes e os serviços
    $classesAquisicao = TipoClasseSv::with('catalogoServico')->get();

    return view('servico.catalogo-servico', compact('aquisicao', 'classesAquisicao'));
}

}
