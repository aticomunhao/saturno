<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\TipoCidade;
use App\Models\TipoUf;
use App\Models\TipoPais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\CpfCnpj;
use App\Rules\Telefone;
use App\Rules\Cep;
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
        $tipoPais = TipoPais::all();


        return view('empresa.incluir-empresa', compact('tp_uf', 'tipoPais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cnpj' => ['required', new CpfCnpj],
            'inscricaoEmail' => 'required|email',
            'inscricaoTelefone' => ['required', new Telefone],
            'inscricaoCep' => ['required', new Cep],
        ]);

         // Verifica se o CNPJ ou CPF já existe
    $cnpjCpfExistente = Empresa::where('cnpj_cpf', $request->input('cnpj'))->exists();

    if ($cnpjCpfExistente) {

        app('flasher')->addError('Não é possível incluir esta empresa, pois ela ja foi registrada.');
        return redirect()->back()->withInput();
    }

        $empresa = Empresa::create([
            'razaosocial' => $request->input('razaoSocial'),
            'nomefantasia' => $request->input('nomeFantasia'),
            'cnpj_cpf' => $request->input('cnpj'),
            'inscestadual' => $request->input('inscricaoEstadual'),
            'inscmunicipal' => $request->input('inscricaoMunicipal'),
            'cep' => $request->input('inscricaoCep'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('inscricaoNumero'),
            'complemento' => $request->input('inscricaoComplemento'),
            'bairro' => $request->input('bairro'),
            'pais_cod' => $request->input('pais'),
            'uf_cod' => $request->input('tp_uf'),
            'telefone' => $request->input('inscricaoTelefone'),
            'email' => $request->input('inscricaoEmail'),
            'municipio_cod' => $request->input('cidade')
        ]);

        app('flasher')->addSuccess('Empresa criada com sucesso.');
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

        $request->validate([
            'cnpj' => ['required', new CpfCnpj],
            'inscricaoEmail' => 'required|email',
            'inscricaoTelefone' => ['required', new Telefone],
            'inscricaoCep' => ['required', new Cep],
        ]);

        $empresa->fill([
            'razaosocial' => $request->input('razaoSocial'),
            'nomefantasia' => $request->input('nomeFantasia'),
            'cnpj_cpf' => $request->input('cnpj'),
            'inscestadual' => $request->input('inscricaoEstadual'),
            'inscmunicipal' => $request->input('inscricaoMunicipal'),
            'cep' => $request->input('inscricaoCep'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('inscricaoNumero'),
            'complemento' => $request->input('inscricaoComplemento'),
            'bairro' => $request->input('bairro'),
            'pais_cod' => $request->input('pais'),
            'uf_cod' => $request->input('tp_uf'),
            'telefone' => $request->input('inscricaoTelefone'),
            'email' => $request->input('inscricaoEmail'),
            'municipio_cod' => $request->input('cidade')
        ]);

        //dd($empresa);

        $empresa->save();

        return redirect()->route('empresa.index');
    }

    public function delete($id)
    {
    $empresa = Empresa::with('documento')->find($id);


    if (!$empresa) {
        app('flasher')->addWarning('Empresa não encontrada.');
        return redirect()->route('empresa.index');
    }

    // Verifica se há documentos associados à empresa
    if ($empresa->documento->count() > 0) {
        app('flasher')->addError('Não é possível excluir esta empresa, pois há documentos associados a ela.');
        return redirect()->route('empresa.index');
    }

    // Se não houver documentos, a empresa é excluída
    $empresa->delete();

    app('flasher')->addSuccess('Empresa deletada com sucesso.');
    return redirect()->route('empresa.index');
    }
}
