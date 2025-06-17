<?php

namespace App\Http\Controllers;

use App\Models\ModelPagamentos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //  public function index()
    // {
    //     $result = DB::select("select * from pagamento");
    //     return $result;
    // }
    // public function indexPagamento()
    // {
    //     $result = $this->index();

    //     return view('pagamento.gerenciar-pagamento', ['result' => $result]);
    // }
    public function indexPagamento()
    {
        $result = ModelPagamentos::orderBy('id', 'asc')->paginate(20); // 20 por página
        return view('pagamento.gerenciar-pagamento', compact('result'));
    }
    public function createPagamento($id)
    {
        $result = ModelPagamentos::where('id', $id)->get();

        return view('pagamento.incluir-pagamento', compact('result'));
    }
    public function indexContrato()
    {
        $result = ModelPagamentos::orderBy('id', 'asc')->paginate(20);


        return view('pagamento.gerenciar-contrato', compact('result'));
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
