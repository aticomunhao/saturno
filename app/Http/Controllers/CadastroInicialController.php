<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCadastroInicial;
use App\Models\SolMaterial;
use App\Models\DepositoMaterial;
use App\Models\Destinacao;
use App\Models\Setor;
use App\Models\CadastroInicial;
use App\Models\Documento;
use App\Models\Empresa;
use App\Models\ItemCatalogoMaterial;
use App\Models\ModelCatMaterial;
use App\Models\ModelTipoMaterial;
use App\Models\StatusCadastroInicial;
use App\Models\TipoDocumento;
use App\Models\TipoCategoriaMt;
use App\Models\ModelUnidadeMedida;
use App\Models\ModelSexo;
use Illuminate\Database\Eloquent\Model;

class CadastroInicialController extends Controller
{
    public function index(Request $request)
    {
        $deposito = DepositoMaterial::all();
        $destinacao = Destinacao::all();
        $categoriaMaterial = ModelCatMaterial::all();
        $empresa = Empresa::all();
        $nomeMaterial = ItemCatalogoMaterial::all();
        $tipoDocumento = TipoDocumento::all();
        $tipoMaterial = ModelTipoMaterial::all();
        $solMat = SolMaterial::all();
        $status = StatusCadastroInicial::all();


        //dd($setor);
        $query = CadastroInicial::with('Status', 'SolOrigem', 'DocOrigem', 'Deposito', 'Destinacao', 'CategoriaMaterial', 'TipoMaterial');

        if ($request->pesquisaDeposito) {
            $query->where('id_deposito', $request->pesquisaDeposito);
        }
        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('data_cadastro', [
                $request->data_inicio . ' 00:00:00',
                $request->data_fim . ' 23:59:59'
            ]);
        }
        if ($request->pesquisaDestinacao) {
            $query->where('id_destinacao', $request->pesquisaDestinacao);
        }
        if ($request->pesquisaCategoriaMaterial) {
            $query->where('id_cat_material', $request->pesquisaCategoriaMaterial);
        }
        if ($request->pesquisaEmpresa) {
            $query->whereHas('DocOrigem', function ($q) use ($request) {
                $q->where('id_empresa', $request->pesquisaEmpresa);
            });
        }
        if ($request->pesquisaNomeMaterial) {
            $query->where('id_nome_mat', $request->pesquisaNomeMaterial);
        }
        if ($request->pesquisaDocumento) {
            $query->whereHas('documento_origem', function ($q) use ($request) {
                $q->where('id_tp_doc', $request->pesquisaDocumento);
            });
        }
        if ($request->pesquisaTipoMaterial) {
            $query->where('id_tipo_material', $request->pesquisaMaterial);
        }
        if ($request->pesquisaSolicitacao) {
            $query->where('id_sol_origem', $request->pesquisaSolicitacao);
        }
        if ($request->pesquisaStatus) {
            $query->where('id_tp_status', $request->pesquisaStatus);
        }

        $cadastroInicial = $query->orderBy('id', 'asc')->paginate(20);

        return view('cadastroinicial.gerenciar-cadastro-inicial', compact( 'request', 'cadastroInicial', 'status', 'solMat', 'tipoMaterial', 'tipoDocumento', 'nomeMaterial', 'deposito', 'destinacao', 'categoriaMaterial', 'empresa'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function storeTermoDoacao()
    {
        $cadastroInicialDoacao = CadastroInicial::create([
            'data_cadastro' => Carbon::now(),
            'id_tp_status' => '1',
        ]);

        app('flasher')->addSuccess('Termo de Doação Criado com Sucesso, Adicione os materiais Necessários');
        return redirect("/gerenciar-cadastro-inicial/doacao/{$cadastroInicialDoacao->id}");
    }

    public function createDoacao()
    {
        $buscaCategoria = TipoCategoriaMt::all();
        $buscaUnidadeMedida = ModelUnidadeMedida::all();
        $buscaSexo = ModelSexo::all();


        return view('/gerenciar-cadastro-inicial/doacao', compact('buscaCategoria', 'buscaUnidadeMedida', 'buscaSexo'));
    }

    public function createCompraDireta()
    {
        $sql ="Select
                    it.id,
                    it.nome,
                    c.nome categoria
                    from item_catalogo_material it
                    join tipo_categoria_material c on it.id_categoria_material = c.id
                ";

        $resultItem = DB::select($sql);

        return view('cadastroinicial/compra-direta-cadastro-inicial-item', compact('resultItem'));
    }

    public function storeDoacao(Request $request)
    {

            $Adquirido = isset($request->checkAdq) ? 1 : 0;
            $Avariado = isset($request->checkAvariado) ? 1 : 0;

            for ($i=0; $i < $request->input('qtdItens'); $i++){

            //???????????? Liberacao_venda, id_tipo_situacao, valor_aquisicao,valor_venda_promocional, ?id_usuario?
            DB::table('item_material')->insert([
            'id_item_catalogo_material' => $request->input('item_material'),
            'observacao' => $request->input('observacao'),
            'data_cadastro' => date("m-d-Y"),
            'id_usuario_cadastro'=> session()->get('usuario.id_usuario'),
            'id_tipo_embalagem' => $request->input('embalagem'),
            'id_tipo_unidade_medida' => $request->input('und_med'),
            'quantidade_embalagem' => $request->input('qtdEmb'),
            'adquirido' => $Adquirido,
            'valor_venda' => $request->input('valor_venda'),
            'id_marca' => $request->input('marca'),
            'id_tamanho' => $request->input('tamanho'),
            'id_cor' => $request->input('cor'),
            'id_tipo_material' => $request->input('tp_mat'),
            'id_fase_etaria' => $request->input('fase_etaria'),
            'id_tp_sexo' => $request->input('sexo'),
            'id_deposito' => $request->input('deposito'),
            'valor_aquisicao' => $request->input ('vlr_aqs'),
            'ref_fabricante' => $request->input ('ref_fab'),
            'avariado' => $Avariado,
            'data_validade' => $request->input('dt_validade'),
            'liberacao_venda' => 0,
            'id_tipo_situacao' => '1',
        ]);
        }

        //dd($request);

        return redirect()->action('CadastroInicialController@index');
    }

    public function storeCompraDireta(Request $request)
    {

            $Adquirido = isset($request->checkAdq) ? 1 : 0;
            $Avariado = isset($request->checkAvariado) ? 1 : 0;

            for ($i=0; $i < $request->input('qtdItens'); $i++){

            //???????????? Liberacao_venda, id_tipo_situacao, valor_aquisicao,valor_venda_promocional, ?id_usuario?
            DB::table('item_material')->insert([
            'id_item_catalogo_material' => $request->input('item_material'),
            'observacao' => $request->input('observacao'),
            'data_cadastro' => date("m-d-Y"),
            'id_usuario_cadastro'=> session()->get('usuario.id_usuario'),
            'id_tipo_embalagem' => $request->input('embalagem'),
            'id_tipo_unidade_medida' => $request->input('und_med'),
            'quantidade_embalagem' => $request->input('qtdEmb'),
            'adquirido' => $Adquirido,
            'valor_venda' => $request->input('valor_venda'),
            'id_marca' => $request->input('marca'),
            'id_tamanho' => $request->input('tamanho'),
            'id_cor' => $request->input('cor'),
            'id_tipo_material' => $request->input('tp_mat'),
            'id_fase_etaria' => $request->input('fase_etaria'),
            'id_tp_sexo' => $request->input('sexo'),
            'id_deposito' => $request->input('deposito'),
            'valor_aquisicao' => $request->input ('vlr_aqs'),
            'ref_fabricante' => $request->input ('ref_fab'),
            'avariado' => $Avariado,
            'data_validade' => $request->input('dt_validade'),
            'liberacao_venda' => 0,
            'id_tipo_situacao' => '1',
        ]);
        }

        //dd($request);

        return redirect()->action('CadastroInicialController@index');
    }
}
