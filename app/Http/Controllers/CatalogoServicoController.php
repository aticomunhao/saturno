<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolServico;
use App\Models\CatalogoServico;
use App\Models\TipoClasseSv;


use function Laravel\Prompts\select;

class CatalogoServicoController extends Controller
{

    public function index(Request $request)
    {
        $query = CatalogoServico::with('tipoClasseSv');

        // Aplicar filtros se forem fornecidos
        if ($request->classe) {
            $query->where('id_cl_sv', $request->classe);
        }

        if ($request->servicos) {
            $query->where('id', $request->servicos);
        }

        $aquisicao = $query->orderBy('id_cl_sv')->paginate(20);

        //dd($aquisicao);

        // Pegar todas as classes e os serviços
        $classeAquisicao = TipoClasseSv::all();

        return view('servico.catalogo-servico', compact('aquisicao', 'classeAquisicao'));
    }

    public function create()
    {

        $classes = TipoClasseSv::all();

        return view('servico.incluir-servico', compact('classes'));
    }

    public function store(Request $request)
    {

        // Verifica se uma nova classe foi fornecida ou se uma classe existente foi selecionada
        $classeId = $request->input('classe_servico');

        if (!$classeId && $request->filled('nova_classe_servico')) {
            // Cria uma nova classe de serviço se o campo de nova classe foi preenchido
            $novaClasse = TipoClasseSv::create([
                'descricao' => $request->input('nova_classe_servico'),
            ]);
            $classeId = $novaClasse->id;
        }

        // Adiciona os tipos de serviço relacionados à classe
        foreach ($request->input('tipos_servico') as $tipoServico) {
            CatalogoServico::create([
                'id_cl_sv' => $classeId,
                'descricao' => $tipoServico,
            ]);
        }

        app('flasher')->addSuccess('Serviço criado com sucesso.');
        return redirect()->route('catalogo-servico.index');
    }

    public function delete($id)
    {
        $tipoServico = CatalogoServico::with('SolServico')->find($id);
        if (!$tipoServico) {
            app('flasher')->addWarning('Serviço não encontrado.');
            return redirect()->route('catalogo-servico.index');
        }
        if ($tipoServico->SolServico->count() > 0) {
            app('flasher')->addError('Não é possível excluir este serviço, pois há documentos associados a ele.');
            return redirect()->route('catalogo-servico.index');
        }

        $tipoServico->delete();

        app('flasher')->addSuccess('Serviço deletado com sucesso.');
        return redirect()->route('catalogo-servico.index');
    }
}
