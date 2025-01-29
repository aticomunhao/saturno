<?php


use App\Http\Controllers\ContaContabilController;
use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LexaAdmin;
use App\Http\Controllers\TipoEstoqueController;
use App\Http\Controllers\SitDoacaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecuperaSenhaController;
use App\Http\Controllers\UnidadeMedidaController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ItemCatalogoController;
use App\Http\Controllers\ComposicaoItemController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TamanhoController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\CatMaterialController;
use App\Http\Controllers\EmbalagemController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\TipoMaterialController;
use App\Http\Controllers\LocalizadorController;
use App\Http\Controllers\FaseEtariaController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\CadastroInicialController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\GerenciarvendasController;
use App\Http\Controllers\SituacaovendaController;
use App\Http\Controllers\RegistrarVendaController;
use App\Http\Controllers\GerenciarDevolucoesController;
use App\Http\Controllers\GerenciarpagamentoController;
use App\Http\Controllers\TipoPagamentoController;
use App\Http\Controllers\GerenciardemonstrativoController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\RegistrarAvariaController;
use App\Http\Controllers\DescontoController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\GerenciarInventariosController;
use App\Http\Controllers\GerenciarPerfil;
use App\Http\Controllers\AquisicaoServicosController;
use App\Http\Controllers\CatalogoEmpresaController;
use App\Http\Controllers\CatalogoServicoController;
use App\Http\Controllers\AquisicaoMaterialController;
use App\Http\Controllers\ValorCompraController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/logout', [LexaAdmin::class, 'logout']);
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::any('/login/home', [LoginController::class, 'valida']);
Route::any('/login/valida', [LoginController::class, 'validaUserLogado'])->name('home.post');

Route::get('/email/remessa-email', [RecuperaSenhaController::class, 'index']);
Route::post('/email/remessa-email', [RecuperaSenhaController::class, 'validar']);

Route::get('/usuario/alterar-senha', [UsuarioController::class, 'alteraSenha']);
Route::post('/usuario/gravaSenha', [UsuarioController::class, 'gravaSenha']);

//Gerenciar usuários
Route::post('/cad-usuario/inserir', [UsuarioController::class, 'store']);
Route::get('/cadastrar-usuarios/configurar/{id}', [UsuarioController::class, 'configurarUsuario']);
Route::get('/gerenciar-usuario', [UsuarioController::class, 'index']);
Route::get('/usuario/alterar/{id}', [UsuarioController::class, 'edit']);
Route::any('/usuario/gerar-Senha/{id}', [UsuarioController::class, 'gerarSenha']);
Route::any('usuario-atualizar/{id}', [UsuarioController::class, 'update']);
Route::get('/usuario/excluir/{id}', [UsuarioController::class, 'destroy']);
Route::get('/usuario-incluir', [UsuarioController::class, 'create']);

//Route::view('/dashboard/index' , 'dashboard/index']);

Route::name('estoque')->group(function () {
    Route::get('/cad-tipo-estoque', [TipoEstoqueController::class, 'index']);
    Route::post('/cad-tipo-estoque/inserir', [TipoEstoqueController::class, 'store']);
    Route::get('/cad-tipo-estoque/excluir/{id}', [TipoEstoqueController::class, 'destroy']);
    Route::get('/cad-tipo-estoque/alterar/{id}', [TipoEstoqueController::class, 'edit']);
    Route::put('/cad-tipo-estoque/atualizar/{id}', [TipoEstoqueController::class, 'update']);
});

Route::name('sit-doacao')->group(function () {
    Route::get('/cad-sit-doacao', [SitDoacaoController::class, 'index']);
    Route::post('/cad-sit-doacao/inserir', [SitDoacaoController::class, 'store']);
    Route::get('/cad-sit-doacao/excluir/{id}', [SitDoacaoController::class, 'destroy']);
    Route::get('/cad-sit-doacao/alterar/{id}', [SitDoacaoController::class, 'edit']);
    Route::put('/cad-sit-doacao/atualizar/{id}', [SitDoacaoController::class, 'update']);
});

Route::get('/unidade-medida', [UnidadeMedidaController::class, 'index']);
Route::post('/unidade-medida/inserir', [UnidadeMedidaController::class, 'store']);
Route::get('/unidade-medida/excluir/{id}', [UnidadeMedidaController::class, 'destroy']);
Route::get('/unidade-medida/alterar/{id}', [UnidadeMedidaController::class, 'edit']);
Route::put('/unidade-medida/atualizar/{id}', [UnidadeMedidaController::class, 'update']);


Route::get('/gerenciar-pessoa', [PessoaController::class, 'index'])->name('listapessoa.index');
Route::get('cad-pessoa', [PessoaController::class, 'create']);
Route::post('cad-pessoa/inserir', [PessoaController::class, 'store'])->name('inserepessoa.index');
Route::get('/filtrar-pessoa', [PessoaController::class, 'show'])->name('filtrarpessoa.show');
Route::get('pessoa/alterar/{id}', [PessoaController::class, 'edit']);
Route::put('pessoa-atualizar/{id}', [PessoaController::class, 'update']);
Route::get('/pessoa/excluir/{id}', [PessoaController::class, 'destroy']);
Route::get('/registrar-pessoa', [PessoaController::class, 'search']);

Route::name('entidade')->group(function () {
    Route::get('cad-entidade', [EntidadeController::class, 'create']);
    Route::post('cad-entidade/inserir', [EntidadeController::class, 'store']);
    Route::get('gerenciar-entidade', [EntidadeController::class, 'index']);
    Route::post('pesquisar-entidade', [EntidadeController::class, 'show']);
    Route::get('entidade/alterar/{id}', [EntidadeController::class, 'edit']);
    Route::put('entidade-atualizar/{id}', [EntidadeController::class, 'update']);
    Route::get('/entidade/excluir/{id}', [EntidadeController::class, 'destroy']);
});




Route::get('/gerenciar-item-catalogo', [ItemCatalogoController::class, 'index']);
Route::get('item-catalogo-incluir', [ItemCatalogoController::class, 'create']);
Route::post('cad-item-material/inserir', [ItemCatalogoController::class, 'store']);
Route::get('/item-catalogo/alterar/{id}', [ItemCatalogoController::class, 'edit']);
Route::put('item-catalogo-atualizar/{id}', [ItemCatalogoController::class, 'update']);
Route::get('/item-catalogo/excluir/{id}', [ItemCatalogoController::class, 'destroy']);
Route::post('/cad-item-material/inserir', [ItemCatalogoController::class, 'store']);

Route::get('gerenciar-composicao', [ComposicaoItemController::class, 'index']);
Route::get('item-composicao/incluir/{id}', [ComposicaoItemController::class, 'create']);
Route::post('item-composicao/inserir', [ComposicaoItemController::class, 'store']);
Route::get('/item-composicao/excluir/{id}/{idComposicao}', [ComposicaoItemController::class, 'destroy']);

Route::get('/marca', [MarcaController::class, 'index']);
Route::post('/marca/inserir', [MarcaController::class, 'store']);
Route::get('/marca/excluir/{id}', [MarcaController::class, 'destroy']);
Route::get('/marca/alterar/{id}', [MarcaController::class, 'edit']);
Route::put('/marca/atualizar/{id}', [MarcaController::class, 'update']);

Route::get('/tamanho', [TamanhoController::class, 'index']);
Route::post('/tamanho/inserir', [TamanhoController::class, 'store']);
Route::get('/tamanho/excluir/{id}', [TamanhoController::class, 'destroy']);
Route::get('/tamanho/alterar/{id}', [TamanhoController::class, 'edit']);
Route::put('/tamanho/atualizar/{id}', [TamanhoController::class, 'update']);

Route::get('/cor', [CorController::class, 'index']);
Route::post('/cor/inserir', [CorController::class, 'store']);
Route::get('/cor/excluir/{id}', [CorController::class, 'destroy']);
Route::get('/cor/alterar/{id}', [CorController::class, 'edit']);
Route::put('/cor/atualizar/{id}', [CorController::class, 'update']);

Route::get('/cad-cat-material', [CatMaterialController::class, 'index'])->name('cadcat.index');
Route::get('/cad-cat-material/incluir', [CatMaterialController::class, 'create']);
Route::post('/cad-cat-material/inserir', [CatMaterialController::class, 'store']);
Route::get('/cad-cat-material/excluir/{id}', [CatMaterialController::class, 'destroy']);
Route::get('/cad-cat-material/alterar/{id}', [CatMaterialController::class, 'edit']);
Route::put('/cad-cat-material/atualizar/{id}', [CatMaterialController::class, 'update']);

Route::get('/cad-embalagem', [EmbalagemController::class, 'index']);
Route::post('/cad-embalagem/inserir', [EmbalagemController::class, 'store']);
Route::get('/cad-embalagem/excluir/{id}', [EmbalagemController::class, 'destroy']);
Route::get('/cad-embalagem/alterar/{id}', [EmbalagemController::class, 'edit']);
Route::put('/cad-embalagem/atualizar/{id}', [EmbalagemController::class, 'update']);

Route::get('/cad-sexo', [SexoController::class, 'index']);
Route::post('/cad-sexo/inserir', [SexoController::class, 'store']);
Route::get('/cad-sexo/excluir/{id}', [SexoController::class, 'destroy']);
Route::get('/cad-sexo/alterar/{id}', [SexoController::class, 'edit']);
Route::put('/cad-sexo/atualizar/{id}', [SexoController::class, 'update']);

Route::get('/cad-tipo-material', [TipoMaterialController::class, 'index']);
Route::post('/cad-tipo-material/inserir', [TipoMaterialController::class, 'store']);
Route::get('/cad-tipo-material/excluir/{id}', [TipoMaterialController::class, 'destroy']);
Route::get('/cad-tipo-material/alterar/{id}', [TipoMaterialController::class, 'edit']);
Route::put('/cad-tipo-material/atualizar/{id}', [TipoMaterialController::class, 'update']);



Route::name('localizador')->group(function () {
    Route::get('/localizador', [LocalizadorController::class, 'index']);
    Route::post('/localizador/inserir', [LocalizadorController::class, 'store']);
    Route::get('/localizador/excluir/{id}', [LocalizadorController::class, 'destroy']);
    Route::get('/localizador/alterar/{id}', [LocalizadorController::class, 'edit']);
    Route::put('/localizador/atualizar/{id}', [LocalizadorController::class, 'update']);
});

Route::get('/fase-etaria', [FaseEtariaController::class, 'index']);
Route::post('/fase-etaria/inserir', [FaseEtariaController::class, 'store']);
Route::get('/fase-etaria/excluir/{id}', [FaseEtariaController::class, 'destroy']);
Route::get('/fase-etaria/alterar/{id}', [FaseEtariaController::class, 'edit']);
Route::put('/fase-etaria/atualizar/{id}', [FaseEtariaController::class, 'edit']);

Route::name('deposito')->group(function () {
    Route::get('/deposito', [DepositoController::class, 'index']);
    Route::post('/deposito/inserir', [DepositoController::class, 'store']);
    Route::get('/deposito/excluir/{id}', [DepositoController::class, 'destroy']);
    Route::get('/deposito/alterar/{id}', [DepositoController::class, 'edit']);
    Route::put('/deposito/atualizar/{id}', [DepositoController::class, 'update']);
});

Route::get('/combo/catItem/{id}', [CadastroInicialController::class, 'getCategoria']);
Route::get('/combo/catForm/{id}', [CadastroInicialController::class, 'getFormCadastro']);
Route::get('/combo/valor/{id}', [CadastroInicialController::class, 'getValor']);
Route::get('/combo/catFormFinal/{id}', [CadastroInicialController::class, 'getFormCadastroFinal']);
Route::get('/combo/catValVariado/{id}', [CadastroInicialController::class, 'getValorVariado']);
Route::get('/combo/composicao/{id}', [CadastroInicialController::class, 'getComposicao']);
Route::post('/cad-inicial-material/inserir', [CadastroInicialController::class, 'store']);
Route::get('/usuario-logado', [CadastroInicialController::class, 'search']);

Route::get('/gerenciar-cadastro-inicial', [CadastroInicialController::class, 'index'])->name('cadastroinicial');
Route::get('/gerenciar-cadastro-inicial/incluir', [CadastroInicialController::class, 'create']);
Route::get('/gerenciar-cadastro-inicial/excluir/{id}', [CadastroInicialController::class, 'destroy']);
Route::get('/editar-cadastro-inicial/{id}/{id_cat}', [CadastroInicialController::class, 'formEditar']);
Route::put('/gerenciar-cadastro-inicial/alterar/{id}', [CadastroInicialController::class, 'update']);

Route::get('/combo/tamanho/{id}', [CadastroInicialController::class, 'getTamanho']);
Route::get('/combo/embalagem/{id}', [CadastroInicialController::class, 'getEmbalagem']);



Route::get('/barcode', [BarcodeController::class, 'index'])->name('codbarras');
Route::get('/item_material/{id}', [BarcodeController::class, 'show']);


Route::name('vendas')->group(function () {
    Route::any('/gerenciar-vendas', [GerenciarvendasController::class, 'index'])->name('.index');
    Route::get('/gerenciar-vendas/excluir/{id}', [GerenciarvendasController::class, 'delete']);
    Route::get('/gerenciar-vendas/finalizar/{id}', [GerenciarvendasController::class, 'finalizar'])->name('finalizarvenda.update');
    Route::get('/gerenciar-vendas/demonstrativo/{id}', [GerenciarvendasController::class, 'update']);
    Route::get('/gerenciar-vendas/demonstrativo/{id}', [GerenciarvendasController::class, 'imprimir']);

    Route::get('/cad-sit-venda', [SituacaovendaController::class, 'index']);
});

Route::get('/registrar-venda-editar/{id_venda}', [RegistrarVendaController::class, 'edit']);
Route::get('/registrar-venda-fimedicao/{id}', [RegistrarVendaController::class, 'fimEdicao']);
Route::get('/registrar-venda', [RegistrarVendaController::class, 'index']);
Route::get('/registrar-venda/buscaritem', [RegistrarVendaController::class, 'buscaritem']);
Route::get('/registrar-venda/getItem/{id}', [RegistrarVendaController::class, 'getItem']);
Route::get('/registrar-venda/setVenda/{id_pessoa}/{data_venda}/{id_usuario}', [RegistrarVendaController::class, 'setVenda']);
Route::get('/registrar-venda/setItemLista/{id_item}/{id_venda}', [RegistrarVendaController::class, 'setItemLista']);
Route::get('/registrar-venda/removeItemLista/{id_item}/{id_venda}', [RegistrarVendaController::class, 'removeItemLista']);
Route::get('/registrar-venda/cancelarVenda/{id_venda}', [RegistrarVendaController::class, 'cancelarVenda']);
Route::get('/registrar-venda/concluirVenda/{id_venda}/{vlr_total}', [RegistrarVendaController::class, 'concluirVenda']);



Route::get('/gerenciar-devolucoes', [GerenciarDevolucoesController::class, 'index']);
Route::get('/criar-devolucao', [GerenciarDevolucoesController::class, 'store']);
Route::any('/incluir-devolucao/{id_p}/{id_venda}/{data}/{id_mat}', [GerenciarDevolucoesController::class, 'create']);
Route::get('/gerenciar-substitutos/{id}', [GerenciarDevolucoesController::class, 'vincular']);
Route::get('/substituicao/buscaritem', [GerenciarDevolucoesController::class, 'buscaritem']);






Route::name('pagamentos')->group(function () {});


Route::get('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'show'])->name('pagamento.show');
Route::post('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'inserir']);
Route::delete('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'destroy']);
Route::get('/alerta-pagamento', [GerenciarpagamentoController::class, 'inserir']);




Route::get('/cad-pagamento', [TipoPagamentoController::class, 'index']);
Route::post('/cad-pagamento/inserir', [TipoPagamentoController::class, 'store']);
Route::get('/cad-pagamento/excluir/{id}', [TipoPagamentoController::class, 'destroy']);
Route::get('/cad-pagamento/alterar/{id}', [TipoPagamentoController::class, 'edit']);
Route::put('/cad-pagamento/atualizar/{id}', [TipoPagamentoController::class, 'update']);

Route::name('relatorios')->group(function () {
    Route::get('/demonstrativo/{id}', [GerenciardemonstrativoController::class, 'index']);
    Route::get('/relatorio-vendas', [RelatoriosController::class, 'index']);
    Route::get('/relatorio-entrada', [RelatoriosController::class, 'entrada']);
    Route::get('/relatorio-saidas', [RelatoriosController::class, 'saida']);
    Route::get('/inventarios', [GerenciarInventariosController::class, 'index']);
    Route::get('/venda-valor', [RelatoriosController::class, 'vendas']);
});

Route::name('valor-avariado')->group(function () {
    Route::get('/cad-valor-avariado', [RegistrarAvariaController::class, 'index'])->name('cadavaria.index');
    Route::post('/cad-valor-avariado/inserir', [RegistrarAvariaController::class, 'insert']);
    Route::get('/cad-valor-avariado/excluir/{id}', [RegistrarAvariaController::class, 'destroy']);
    Route::get('/cad-valor-avariado/alterar/{id}', [RegistrarAvariaController::class, 'edit']);
    Route::any('/alterar-valor-avariado/atualizar/{id}', [RegistrarAvariaController::class, 'update']);
});

Route::name('descontos')->group(function () {
    Route::get('/gerenciar-desconto', [DescontoController::class, 'index']);
    Route::get('/criar-desconto', [DescontoController::class, 'create']);
    Route::post('/incluir-desconto', [DescontoController::class, 'store']);
    Route::get('/desconto-alterar/{id}', [DescontoController::class, 'edit']);
    Route::post('/modifica-desconto/{id}', [DescontoController::class, 'update']);
    Route::get('/desconto/excluir/{id}', [DescontoController::class, 'destroy']);
    Route::get('/desconto/ativar/{id}', [DescontoController::class, 'active']);
    Route::get('/desconto/inativar/{id}', [DescontoController::class, 'inactive']);
});

//Route::get('/calculos/Calculadora/{id}',[CalculadoraController::class,'calcular']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Gerenciar Perfis
Route::get('/gerenciar-perfis', [GerenciarPerfil::class, 'index']);
Route::post('/armazenar-perfis', [GerenciarPerfil::class, 'store']);
Route::get('/visualizar-perfis/{id}', [GerenciarPerfil::class, 'show']);
Route::get('/editar-perfis/{id}', [GerenciarPerfil::class, 'edit']);
Route::post('/atualizar-perfis/{id}', [GerenciarPerfil::class, 'update']);
Route::any('/excluir-perfis/{id}', [GerenciarPerfil::class, 'destroy']);

//Gerenciar Aquisição de Serviço
Route::get('/gerenciar-aquisicao-servicos', [AquisicaoServicosController::class, 'index']);
Route::get('/retorna-nome-servicos/{id}', [AquisicaoServicosController::class, 'retornaNomeServicos']);
Route::get('/incluir-aquisicao-servicos', [AquisicaoServicosController::class, 'create']);
Route::post('/salvar-aquisicao-servicos', [AquisicaoServicosController::class, 'store']);
Route::get('/editar-aquisicao-servicos/{idS}', [AquisicaoServicosController::class, 'edit']);
Route::put('/atualizar-aquisicao-servicos/{id}', [AquisicaoServicosController::class, 'update'])->name('atualizar-aquisicao-servico');
Route::get('/aprovar-aquisicao-servicos/{idSolicitacao}', [AquisicaoServicosController::class, 'aprovar']);
Route::post('/validaAprovacao-aquisicao-servicos', [AquisicaoServicosController::class, 'validaAprovacao']);
Route::any('/enviar-aquisicao-servicos/{idS}', [AquisicaoServicosController::class, 'enviar']);
Route::post('/aprovar-em-lote', [AquisicaoServicosController::class, 'aprovarEmLote'])->name('aquisicao.aprovarEmLote');
Route::get('/homologar-aquisicao-servicos/{id}', [AquisicaoServicosController::class, 'homologar']);
Route::post('/validaHomologacao-aquisicao-servicos', [AquisicaoServicosController::class, 'validaHomologacao']);
Route::post('/homologar-em-lote', [AquisicaoServicosController::class, 'homologarEmLote'])->name('aquisicao.homologarEmLote');
Route::get('/visualizar-aquisicao-servicos/{id}', [AquisicaoServicosController::class, 'show'])->name('visualizar.aquisicao.servicos');
Route::any('/aditivo-aquisicao-servicos/{idS}', [AquisicaoServicosController::class, 'aditivo']);
Route::post('/validaAditivo-aquisicao-servicos', [AquisicaoServicosController::class, 'validaAditivo']);


//Catálogo de Empresas
Route::get('/catalogo-empresa', [CatalogoEmpresaController::class, 'index'])->name('empresa.index');
Route::get('/incluir-empresa', [CatalogoEmpresaController::class, 'create']);
Route::post('/salvar-empresa', [CatalogoEmpresaController::class, 'store']);
Route::get('/retorna-cidade-dados-residenciais/{id}', [CatalogoEmpresaController::class, 'retornaCidadeDadosResidenciais']);
Route::get('/editar-empresa/{id}', [CatalogoEmpresaController::class, 'edit']);
Route::post('/atualizar-empresa', [CatalogoEmpresaController::class, 'update']);
Route::delete('/deletar-empresa/{$id}', [CatalogoEmpresaController::class, 'delete']);
Route::get('/retorna-endereco/{cep}', [CatalogoEmpresaController::class, 'retornaEndereco']);

//Catálogo de Serviços
Route::get('/catalogo-servico', [CatalogoServicoController::class, 'index'])->name('catalogo-servico.index');
Route::get('/incluir-servico', [CatalogoServicoController::class, 'create']);
Route::post('/salvar-servico', [CatalogoServicoController::class, 'store']);
Route::get('/get-tipos/{classe_id}', [CatalogoServicoController::class, 'getTipos']);
Route::get('/editar-servico/{id}', [CatalogoServicoController::class, 'edit']);
Route::post('/atualizar-servico/{id}', [CatalogoServicoController::class, 'update']);
Route::delete('/deletar-servico/{id}', [CatalogoServicoController::class, 'delete']);
Route::delete('/deletar-classe-servico', [CatalogoServicoController::class, 'deleteClasse']);

//Cadastro De Documentos
Route::get('/gerenciar-documentos', [DocumentoController::class, 'index'])->name('documento.index');
Route::get('/incluir-documento', [DocumentoController::class, 'create'])->name('documento.create');
Route::any('/salvar-documento', [DocumentoController::class, 'store'])->name('documento.store');
Route::get('/retorna-documento/{id}', [DocumentoController::class, 'show'])->name('documento.show');
Route::get('/editar-documento/{id}', [DocumentoController::class, 'edit'])->name('documento.edit');
Route::post('/atualizar-documento/{id}', [DocumentoController::class, 'update'])->name('documento.edit');
Route::delete('/deletar-empresa/{id}', [CatalogoEmpresaController::class, 'delete'])->name('empresa.delete');


//Gerenciar Aquisição de Material
Route::get('/gerenciar-aquisicao-material', [AquisicaoMaterialController::class, 'index']);
Route::get('/incluir-aquisicao-material', [AquisicaoMaterialController::class, 'create']);
Route::post('/salvar-aquisicao-material', [AquisicaoMaterialController::class, 'store']);
Route::get('/incluir-aquisicao-material-2/{id}', [AquisicaoMaterialController::class, 'create2']);
Route::post('/incluir-material-solicitacao/{id}', [AquisicaoMaterialController::class, 'store2']);
Route::get('/marcas/{categoriaId}', [AquisicaoMaterialController::class, 'getMarcas']);
Route::get('/tamanhos/{categoriaId}', [AquisicaoMaterialController::class, 'getTamanhos']);
Route::get('/cores/{categoriaId}', [AquisicaoMaterialController::class, 'getCores']);
Route::get('/fases/{categoriaId}', [AquisicaoMaterialController::class, 'getFases']);
Route::get('/nome/{categoriaId}', [AquisicaoMaterialController::class, 'getNomes']);
Route::delete('/excluir-material-solicitacao', [AquisicaoMaterialController::class, 'destroyMaterial']);
Route::post('/salvar-proposta-material/{id}', [AquisicaoMaterialController::class, 'store3']);

//Valor Mínimo de Compra
Route::get('/valor-compra', [ValorCompraController::class, 'index']);

//Contas Contabeis

Route::get('/conta-contabil', [ContaContabilController::class, 'index'])->name('conta-contabil.index');
Route::get('/conta-contabil/form', [ContaContabilController::class, 'create'])->name('conta-contabil.create');
Route::post('/conta-contabil/store', [ContaContabilController::class, 'store'])->name('conta-contabil.store');
Route::get('/conta-contabil/edit/{id}',[ContaContabilController::class,'edit'])->name('conta-contabil.edit');
Route::put('/conta-contabil/update/{id}', [ContaContabilController::class,'update'])->name('conta-contabil.update');
Route::any('/conta-contabil/inativar/{id}', [ContaContabilController::class,'inativar'])->name('conta-contabil.inativar');

