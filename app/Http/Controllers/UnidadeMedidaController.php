<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUnidadeMedida;
use Illuminate\Support\Facades\DB;


class UnidadeMedidaController extends Controller
{
    public function index()
    {
        $result = ModelUnidadeMedida::all();

        return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ModelUnidadeMedida::Create([
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla'),
            'ativo' => 1,
            'tipo' => 1,
        ]);

        $result = ModelUnidadeMedida::all();
        return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultUniMed = DB::select("select id, nome, sigla from tipo_unidade_medida where id = $id");

        return view('/cadastro-geral/alterar-unidade-medida', compact('resultUniMed'));
    }

    public function update(Request $request, $id)
    {
        DB::table('tipo_unidade_medida')
            ->where('id', $id)
            ->update([
                'nome' => $request->input('unidade_med'),
                'sigla' => $request->input('sigla')
            ]);

        return redirect()->action('UnidadeMedidaController@index');
    }

    public function destroy($id)
    {
        $count = DB::table('embalagem')
            ->where('id_un_med_n1', $id)
            ->orWhere('id_un_med_n2', $id)
            ->count();

        if ($count == 0)
            $deleted = DB::table('tipo_unidade_medida')
            ->where('id', $id)
            ->update([
                'ativo' => 0,
            ]);
        else
            app('flasher')->addError('Não é possível excluir esta unidade de medida, pois ela está vinculada a um material');
        ;

        $result = ModelUnidadeMedida::all();
        return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }
}
