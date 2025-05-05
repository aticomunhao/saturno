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

        $result = ModelUnidadeMedida::where('tipo', 2)->where('ativo', true)->orderBy('id', 'asc')->paginate(20);

        return view('/embalagem/cad-embalagem', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        return redirect()->route('embalagem.index');
    }
    public function storeCad(Request $request)
    {
        ModelUnidadeMedida::Create([
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla'),
            'ativo' => 1,
            'tipo' => 2,
        ]);

        return redirect()->route('cadEmbalagem.index');
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
        return redirect()->route('cadEmbalagem.index');
    }

    public function inativarCad($id)
    {
        $count = DB::table('embalagem')
            ->where('id_un_med_n1', $id)
            ->orWhere('id_un_med_n2', $id)
            ->orWhere('id_un_med_n3', $id)
            ->orWhere('id_un_med_n4', $id)
            ->count();

        if ($count == 0) {
            ModelUnidadeMedida::where('id', $id)->update(['ativo' => 0]);
            app('flasher')->addSuccess('Unidade de medida inativada com sucesso!');
        } else {
            app('flasher')->addError('Não é possível inativar esta unidade de medida, pois ela está vinculada a um material.');
        }

        return redirect()->route('cadEmbalagem.index');
    }
    public function deleteCad($id)
    {
        $count = DB::table('embalagem')
            ->where('id_un_med_n1', $id)
            ->orWhere('id_un_med_n2', $id)
            ->orWhere('id_un_med_n3', $id)
            ->orWhere('id_un_med_n4', $id)
            ->count();

        if ($count == 0) {
            ModelUnidadeMedida::where('id', $id)->delete();
            app('flasher')->addSuccess('Unidade de medida excluída com sucesso!');
        } else {
            app('flasher')->addError('Não é possível excluir esta unidade de medida, pois ela está vinculada a um material.');
        }
        return redirect()->route('cadEmbalagem.index');
    }
}
