<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Empresa;
use App\Models\Setor;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_de_documentos = Documento::with(['tipoDocumento', 'empresa'])->get();
        //dd($lista_de_documentos);
        $lista_de_empresas = Empresa::all();
        $tipo_de_tipos_documentos = TipoDocumento::all();
        // dd($lista_documentos);


        return view('documento.index', compact('lista_de_documentos', 'lista_de_empresas', 'tipo_de_tipos_documentos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        $tipos_documentos = TipoDocumento::all();
        $setores = Setor::all();

        return view('documento.create', compact('empresas', 'tipos_documentos', 'setores'));
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
}
