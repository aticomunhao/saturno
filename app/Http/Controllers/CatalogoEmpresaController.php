<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\TipoCidade;
use App\Models\TipoUf;
use App\Models\TipoPais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function Laravel\Prompts\select;

class CatalogoEmpresaController extends Controller
{

    public function index(Request $request)
    {

        $query = Empresa::with(['TipoUf']);

        if ($request->razaoSocial) {
            $query->where('razaosocial', $request->razaoSocial);
        }
        if ($request->nomeFantasia) {
            $query->where('nomefantasia', $request->nomeFantasia);
        }

        $empresa = $query->orderby('nomefantasia')->paginate(20);


        return view('empresa.catalogo-empresa', compact('empresa'));
    }

    public function create()
    {

        $tp_uf = TipoUf::all();


        return view('empresa.incluir-empresa', compact('tp_uf'));
    }

    public function store(Request $request)
    {

        $empresa = Empresa::create([
            'razaosocial' => $request->input('razaoSocial'),
            'nomefantasia' => $request->input('nomeFantasia'),
            'cnpj_cpf' => $request->input('cnpj'),
            'inscestadual' => $request->input('inscricaoEstadual'),
            'inscmunicipal' => $request->input('inscricaoMunicipal'),
            'cep' => $request->input('inscricaoCep'),
            'logradouro' => $request->input('inscricaoLogradouro'),
            'numero' => $request->input('inscricaoNumero'),
            'complemento' => $request->input('inscricaoComplemento'),
            'bairro' => $request->input('inscricaoBairro'),
            'pais_cod' => $request->input('pais'),
            'uf_cod' => $request->input('tp_uf'),
            'telefone' => $request->input('inscricaoTelefone'),
            'email' => $request->input('inscricaoEmail'),
            'municipio_cod' => $request->input('cidade')
        ]);


        return redirect()->route('empresa.index');
    }

    public function retornaCidadeDadosResidenciais($id)
    {
        $cidadeDadosResidenciais = TipoCidade::with('TipoUf')->where('id_uf', $id)->orderby('descricao')->get();

        return response()->json($cidadeDadosResidenciais);
    }

    public function edit($id)
    {

        $buscaEmpresa = Empresa::with(['TipoUf', 'TipoPais', 'TipoCidade'])->find($id);
        $tiposUf = TipoUf::all();
        $tipoPais = TipoPais::all();
        $tipoCidade = TipoCidade::all();

        //dd($buscaEmpresa->TipoUf->id);



        return view('empresa.editar-empresa', compact('buscaEmpresa', 'tiposUf', 'tipoPais', 'tipoCidade'));
    }

    public function update(Request $request)
    {
        $empresa = Empresa::find($request->input('id'));


        $empresa->razaosocial = $request->input('razaoSocial');
        $empresa->nomefantasia = $request->input('nomeFantasia');
        $empresa->cnpj_cpf = $request->input('cnpj');
        $empresa->pais_cod = $request->input('pais');
        $empresa->inscestadual = $request->input('inscricaoEstadual');
        $empresa->inscmunicipal = $request->input('inscricaoMunicipal');
        $empresa->telefone = $request->input('telefone');
        $empresa->email = $request->input('inscricaoEmail');
        $empresa->cep = $request->input('inscricaoCep');
        $empresa->uf_cod = $request->input('tp_uf');
        $empresa->municipio_cod = $request->input('cidade');
        $empresa->logradouro = $request->input('inscricaoLogradouro');
        $empresa->numero = $request->input('inscricaoNumero');
        $empresa->complemento = $request->input('inscricaoComplemento');
        $empresa->bairro = $request->input('inscricaoBairro');
        $empresa->uf_cod = $request->input('inscricaoCodMun');

        //dd($empresa);

        $empresa->save();

        return redirect()->route('empresa.index');
    }

    public function delete($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('empresa.index')->with('error', 'Empresa não encontrada.');
        }

        $empresa->delete();

        return redirect()->route('empresa.index')->with('success', 'Empresa deletada com sucesso.');
    }
}
