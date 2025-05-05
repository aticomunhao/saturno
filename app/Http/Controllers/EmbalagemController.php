<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEmbalagem;
use App\Models\ModelItemCatalogoMaterial;
use App\Models\ModelUnidadeMedida;
use App\Models\ModelTipoCategoriaMt;
use Illuminate\Support\Facades\DB;

class EmbalagemController extends Controller
{
    public function index(Request $request)
    {
        $query = ModelItemCatalogoMaterial::with('tipoCategoriaMt');
        if ($request->categoria) {
            $query->where('id_categoria_material', $request->categoria);
        }
        if ($request->nomeMaterial) {
            $query->where('nome', $request->nomeMaterial);
        }

        $result = $query->orderBy('id', 'asc')->paginate(20);

        $categoria = ModelTipoCategoriaMt::all();
        $nomeMaterial = ModelItemCatalogoMaterial::all();

        return view('/embalagem/gerenciar-embalagem', compact('result', 'categoria', 'nomeMaterial'));
    }

    public function indexCad()
    {

        $result = ModelUnidadeMedida::where('tipo', 2)->where('ativo', true)->get();

        return view('/embalagem/cad-embalagem', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        return view('/embalagem/gerenciar-embalagem');
    }
    public function storeCad(Request $request)
    {
        ModelUnidadeMedida::Create([
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla'),
            'ativo' => 1,
            'tipo' => 2,
        ]);

        $result = ModelUnidadeMedida::where('tipo', 2)->where('ativo', true)->get();

        return view('/embalagem/cad-embalagem', compact('result'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

    }

    public function updateCad(Request $request, $id)
    {
        $embalagem = ModelUnidadeMedida::findOrFail($id);
        $embalagem->nome = $request->unidade_med;
        $embalagem->sigla = $request->sigla;
        $embalagem->save();

        app('flasher')->addSuccess('Embalagem atualizada com sucesso!');
        return redirect()->back();
    }

    public function deleteCad($id)
    {
        try {
            $embalagem = ModelUnidadeMedida::findOrFail($id);
            $embalagem->ativo = false;
            $embalagem->save();

            app('flasher')->addSuccess('Embalagem inativada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            app('flasher')->addError('Erro ao inativar embalagem.');
            return redirect()->back();
        }
    }
}
