<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCadastroInicial;
use App\Models\ModelSolMaterial;
use App\Models\ModelDepositoMaterial;
use App\Models\ModelDestinacao;
use App\Models\ModelSetor;
use App\Models\ModelDocumento;
use App\Models\ModelEmpresa;
use App\Models\ModelItemCatalogoMaterial;
use App\Models\ModelCatMaterial;
use App\Models\ModelTipoMaterial;
use App\Models\ModelStatusCadastroInicial;
use App\Models\ModelTipoDocumento;
use App\Models\ModelTipoCategoriaMt;
use App\Models\ModelUnidadeMedida;
use App\Models\ModelSexo;
use App\Models\ModelCor;
use App\Models\ModelFaseEtaria;
use App\Models\ModelMarca;
use App\Models\ModelTamanho;
use App\Models\ModelMatProposta;
use Illuminate\Database\Eloquent\Model;

class CadastroInicialController extends Controller
{
    public function index(Request $request)
    {
        $deposito = ModelDepositoMaterial::all();
        $destinacao = ModelDestinacao::all();
        $categoriaMaterial = ModelCatMaterial::all();
        $empresa = ModelEmpresa::all();
        $nomeMaterial = ModelItemCatalogoMaterial::all();
        $tipoDocumento = ModelTipoDocumento::all();
        $tipoMaterial = ModelTipoMaterial::all();
        $solMat = ModelSolMaterial::all();
        $status = ModelStatusCadastroInicial::all();


        //dd($setor);
        $query = ModelCadastroInicial::with('Status', 'SolOrigem', 'DocOrigem', 'Deposito', 'Destinacao', 'CategoriaMaterial', 'TipoMaterial');

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

        $CadastroInicial = $query->orderBy('id', 'asc')->paginate(20);

        return view('cadastroInicial.gerenciar-cadastro-inicial', compact('request', 'CadastroInicial', 'status', 'solMat', 'tipoMaterial', 'tipoDocumento', 'nomeMaterial', 'deposito', 'destinacao', 'categoriaMaterial', 'empresa'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function storeTermoDoacao()
    {

        $CadastroInicialDoacao = ModelDocumento::create([
            'id_tp_doc' => '16',
            'dt_doc' => Carbon::now(),

        ]);

        app('flasher')->addSuccess('Termo de Doação Criado com Sucesso, Adicione os materiais Necessários');
        return redirect("/gerenciar-cadastro-inicial/doacao/{$CadastroInicialDoacao->id}");
    }

    public function createDoacao($id)
    {
        $idDocumento = $id;
        $setor = session('usuario.setor');

        $buscaCategoria = ModelTipoCategoriaMt::all();
        $buscaEmpresa = ModelEmpresa::all();
        $buscaMarca = ModelMarca::all();
        $buscaTamanho = ModelTamanho::all();
        $buscaCor = ModelCor::all();
        $buscaFaseEtaria = ModelFaseEtaria::all();
        $buscaSexo = ModelSexo::all();
        $bucaItemCatalogo = ModelItemCatalogoMaterial::all();
        $buscaUnidadeMedida = ModelUnidadeMedida::where('tipo', '2')->get();
        $buscaSetor = ModelSetor::whereIn('id', $setor)->get();
        $materiais = ModelMatProposta::with('documentoMaterial', 'tipoUnidadeMedida', 'tipoItemCatalogoMaterial', 'tipoCategoria', 'tipoMarca', 'tipoTamanho', 'tipoCor', 'tipoFaseEtaria', 'tipoSexo')->where('id_sol_mat', $id)->get();
        $buscaTipoMaterial = ModelTipoMaterial::all();

        $resultDocumento = ModelDocumento::where('id', $id)->first();
        $result = ModelCadastroInicial::with('ItemCatalogoMaterial', 'Embalagem', 'CategoriaMaterial', 'TipoMaterial')->where('documento_origem', $id)->get();

        return view("cadastroInicial.doacao-cadastro-inicial-item", compact('result', 'resultDocumento', 'buscaSetor', 'buscaEmpresa', 'buscaCategoria', 'buscaTipoMaterial', 'idDocumento', 'buscaUnidadeMedida', 'buscaSexo'));
    }

    public function storeDoacao(Request $request)
    {
        $sacola = isset($request->sacolaBtn) ? 1 : 0;



        return redirect()->action('CadastroInicial');
    }

    public function createCompraDireta()
    {
        $sql = "Select
                    it.id,
                    it.nome,
                    c.nome categoria
                    from item_catalogo_material it
                    join tipo_categoria_material c on it.id_categoria_material = c.id
                ";

        $resultItem = DB::select($sql);

        return view('cadastroInicial/compra-direta-cadastro-inicial-item', compact('resultItem'));
    }

    public function storeCompraDireta(Request $request)
    {

        $Adquirido = isset($request->checkAdq) ? 1 : 0;
        $Avariado = isset($request->checkAvariado) ? 1 : 0;

        for ($i = 0; $i < $request->input('qtdItens'); $i++) {

            //???????????? Liberacao_venda, id_tipo_situacao, valor_aquisicao,valor_venda_promocional, ?id_usuario?
            DB::table('item_material')->insert([
                'id_item_catalogo_material' => $request->input('item_material'),
                'observacao' => $request->input('observacao'),
                'data_cadastro' => date("m-d-Y"),
                'id_usuario_cadastro' => session()->get('usuario.id_usuario'),
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
                'valor_aquisicao' => $request->input('vlr_aqs'),
                'ref_fabricante' => $request->input('ref_fab'),
                'avariado' => $Avariado,
                'data_validade' => $request->input('dt_validade'),
                'liberacao_venda' => 0,
                'id_tipo_situacao' => '1',
            ]);
        }

        //dd($request);

        return redirect()->action('cadastroInicialController@index');
    }
    public function storeMaterial(Request $request, $id)
    {
        $idDocumento = $id;
        $checkAvariado = isset($request->checkAvariado) ? 1 : 0;
        $checkAplicacao = isset($request->checkAplicacao) ? 1 : 0;


        $dadosComuns = [
            'id_cat_material' => $request->input('categoriaMaterial'),
            'id_item_catalogo' => $request->input('nomeMaterial'),
            'id_tipo_material' => $request->input('tipoMaterial'),
            'id_embalagem' => $request->input('embalagemMaterial'),
            'modelo' => $request->input('modeloMaterial'),
            'observacao' => $request->input('observacaoMaterial'),
            'avariado' => $checkAvariado,
            'aplicacao' => $checkAplicacao,
            'data_validade' => $request->input('dataValidadeMaterial'),
            'id_marca' => $request->input('marcaMaterial'),
            'id_tamanho' => $request->input('tamanhoMaterial'),
            'id_cor' => $request->input('corMaterial'),
            'id_fase_etaria' => $request->input('faseEtariaMaterial'),
            'id_tp_sexo' => $request->input('sexoMaterial'),
            'data_cadastro' => Carbon::now(),
            'adquirido' => false,
            'id_deposito' => '1',
            'id_tp_status' => '1',
            'documento_origem' => $id,
        ];

        $quantidade = (int) $request->input('quantidadeMaterial');
        $tipoMaterial = (int) $request->input('tipoMaterial');

        if ($tipoMaterial === 1) {
            // Cria vários registros com quantidade = 1
            for ($i = 0; $i < $quantidade; $i++) {
                ModelCadastroInicial::create(array_merge($dadosComuns, ['quantidade' => 1]));
            }
        } else {
            // Cria apenas um registro com a quantidade total
            ModelCadastroInicial::create(array_merge($dadosComuns, ['quantidade' => $quantidade]));
        }

        app('flasher')->addSuccess('Material adicionado com sucesso!');
        return redirect()->route('doacao', ['id' => $idDocumento]);
    }

    public function storeTermoMaterial(Request $request, $id)
    {
        $idDocumento = $id;

        // Verifica se um arquivo foi enviado
        if ($request->hasFile('arquivoDocDoacao') && $request->file('arquivoDocDoacao')->isValid()) {
            // Salva o arquivo no disco 'public' dentro da pasta 'termos-doacao'
            $caminhoArquivo = $request->file('arquivoDocDoacao')->store('termos-doacao', 'public');
        } else {
            // Se nenhum novo arquivo foi enviado, mantém o caminho atual (se necessário)
            $caminhoArquivo = null;
        }

        // Atualiza os dados no banco
        $dadosAtualizados = [
            'id_empresa' => $request->input('empresaDocDoacao'),
            'id_setor' => $request->input('setorDocDoacao'),
        ];

        // Só atualiza o número se houver valor preenchido
        if ($request->filled('numeroDocDoacao')) {
            $dadosAtualizados['numero'] = $request->input('numeroDocDoacao');
        }

        // Só adiciona o arquivo se ele foi enviado
        if ($caminhoArquivo) {
            $dadosAtualizados['end_arquivo'] = $caminhoArquivo;
        }

        ModelDocumento::where('id', $idDocumento)->update($dadosAtualizados);

        return redirect()->route('doacao', ['id' => $idDocumento]);
    }

}
