<?php


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

//Route::view('/dashboard/index' , 'dashboard/index'])->middleware('validaUsuario');

Route::name('estoque')->middleware('validaUsuario')->group(function () {
    Route::get('/cad-tipo-estoque', [TipoEstoqueController::class, 'index']);
    Route::post('/cad-tipo-estoque/inserir', [TipoEstoqueController::class, 'store']);
    Route::get('/cad-tipo-estoque/excluir/{id}', [TipoEstoqueController::class, 'destroy']);
    Route::get('/cad-tipo-estoque/alterar/{id}', [TipoEstoqueController::class, 'edit']);
    Route::put('/cad-tipo-estoque/atualizar/{id}', [TipoEstoqueController::class, 'update']);
});

Route::name('sit-doacao')->middleware('validaUsuario')->group(function () {
    Route::get('/cad-sit-doacao', [SitDoacaoController::class, 'index']);
    Route::post('/cad-sit-doacao/inserir', [SitDoacaoController::class, 'store']);
    Route::get('/cad-sit-doacao/excluir/{id}', [SitDoacaoController::class, 'destroy']);
    Route::get('/cad-sit-doacao/alterar/{id}', [SitDoacaoController::class, 'edit']);
    Route::put('/cad-sit-doacao/atualizar/{id}', [SitDoacaoController::class, 'update']);
});

Route::get('/unidade-medida', [UnidadeMedidaController::class, 'index'])->middleware('validaUsuario');
Route::post('/unidade-medida/inserir', [UnidadeMedidaController::class, 'store'])->middleware('validaUsuario');
Route::get('/unidade-medida/excluir/{id}', [UnidadeMedidaController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/unidade-medida/alterar/{id}', [UnidadeMedidaController::class, 'edit'])->middleware('validaUsuario');
Route::put('/unidade-medida/atualizar/{id}', [UnidadeMedidaController::class, 'update'])->middleware('validaUsuario');


Route::get('/gerenciar-pessoa', [PessoaController::class, 'index'])->middleware('validaUsuario')->name('listapessoa.index');
Route::get('cad-pessoa', [PessoaController::class, 'create'])->middleware('validaUsuario');
Route::post('cad-pessoa/inserir', [PessoaController::class, 'store'])->middleware('validaUsuario')->name('inserepessoa.index');
Route::get('/filtrar-pessoa', [PessoaController::class, 'show'])->middleware('validaUsuario')->name('filtrarpessoa.show');
Route::get('pessoa/alterar/{id}', [PessoaController::class, 'edit'])->middleware('validaUsuario');
Route::put('pessoa-atualizar/{id}', [PessoaController::class, 'update'])->middleware('validaUsuario');
Route::get('/pessoa/excluir/{id}', [PessoaController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/registrar-pessoa', [PessoaController::class, 'search'])->middleware('validaUsuario');

Route::name('entidade')->middleware('validaUsuario')->group(function () {
    Route::get('cad-entidade', [EntidadeController::class, 'create']);
    Route::post('cad-entidade/inserir', [EntidadeController::class, 'store']);
    Route::get('gerenciar-entidade', [EntidadeController::class, 'index']);
    Route::post('pesquisar-entidade', [EntidadeController::class, 'show']);
    Route::get('entidade/alterar/{id}', [EntidadeController::class, 'edit']);
    Route::put('entidade-atualizar/{id}', [EntidadeController::class, 'update']);
    Route::get('/entidade/excluir/{id}', [EntidadeController::class, 'destroy']);
});




Route::get('gerenciar-item-catalogo', [ItemCatalogoController::class, 'index'])->middleware('validaUsuario');
Route::get('item-catalogo-incluir', [ItemCatalogoController::class, 'create'])->middleware('validaUsuario');
Route::post('cad-item-material/inserir', [ItemCatalogoController::class, 'store'])->middleware('validaUsuario');
Route::get('/item-catalogo/alterar/{id}', [ItemCatalogoController::class, 'edit'])->middleware('validaUsuario');
Route::put('item-catalogo-atualizar/{id}', [ItemCatalogoController::class, 'update'])->middleware('validaUsuario');
Route::get('/item-catalogo/excluir/{id}', [ItemCatalogoController::class, 'destroy'])->middleware('validaUsuario');
Route::post('/cad-item-material/inserir', [ItemCatalogoController::class, 'store'])->middleware('validaUsuario');

Route::get('gerenciar-composicao', [ComposicaoItemController::class, 'index'])->middleware('validaUsuario');
Route::get('item-composicao/incluir/{id}', [ComposicaoItemController::class, 'create'])->middleware('validaUsuario');
Route::post('item-composicao/inserir', [ComposicaoItemController::class, 'store'])->middleware('validaUsuario');
Route::get('/item-composicao/excluir/{id}/{idComposicao}', [ComposicaoItemController::class, 'destroy'])->middleware('validaUsuario');

Route::get('/marca', [MarcaController::class, 'index'])->middleware('validaUsuario');
Route::post('/marca/inserir', [MarcaController::class, 'store'])->middleware('validaUsuario');
Route::get('/marca/excluir/{id}', [MarcaController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/marca/alterar/{id}', [MarcaController::class, 'edit'])->middleware('validaUsuario');
Route::put('/marca/atualizar/{id}', [MarcaController::class, 'update'])->middleware('validaUsuario');

Route::get('/tamanho', [TamanhoController::class, 'index'])->middleware('validaUsuario');
Route::post('/tamanho/inserir', [TamanhoController::class, 'store'])->middleware('validaUsuario');
Route::get('/tamanho/excluir/{id}', [TamanhoController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/tamanho/alterar/{id}', [TamanhoController::class, 'edit'])->middleware('validaUsuario');
Route::put('/tamanho/atualizar/{id}', [TamanhoController::class, 'update'])->middleware('validaUsuario');

Route::get('/cor', [CorController::class, 'index'])->middleware('validaUsuario');
Route::post('/cor/inserir', [CorController::class, 'store'])->middleware('validaUsuario');
Route::get('/cor/excluir/{id}', [CorController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cor/alterar/{id}', [CorController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cor/atualizar/{id}', [CorController::class, 'update'])->middleware('validaUsuario');

Route::get('/cad-cat-material', [CatMaterialController::class, 'index'])->middleware('validaUsuario')->name('cadcat.index');
Route::post('/cad-cat-material/inserir', [CatMaterialController::class, 'store'])->middleware('validaUsuario');
Route::get('/cad-cat-material/excluir/{id}', [CatMaterialController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cad-cat-material/alterar/{id}', [CatMaterialController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cad-cat-material/atualizar/{id}', [CatMaterialController::class, 'update'])->middleware('validaUsuario');

Route::get('/cad-embalagem', [EmbalagemController::class, 'index'])->middleware('validaUsuario');
Route::post('/cad-embalagem/inserir', [EmbalagemController::class, 'store'])->middleware('validaUsuario');
Route::get('/cad-embalagem/excluir/{id}', [EmbalagemController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cad-embalagem/alterar/{id}', [EmbalagemController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cad-embalagem/atualizar/{id}', [EmbalagemController::class, 'update'])->middleware('validaUsuario');

Route::get('/cad-sexo', [SexoController::class, 'index'])->middleware('validaUsuario');
Route::post('/cad-sexo/inserir', [SexoController::class, 'store'])->middleware('validaUsuario');
Route::get('/cad-sexo/excluir/{id}', [SexoController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cad-sexo/alterar/{id}', [SexoController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cad-sexo/atualizar/{id}', [SexoController::class, 'update'])->middleware('validaUsuario');

Route::get('/cad-tipo-material', [TipoMaterialController::class, 'index'])->middleware('validaUsuario');
Route::post('/cad-tipo-material/inserir', [TipoMaterialController::class, 'store'])->middleware('validaUsuario');
Route::get('/cad-tipo-material/excluir/{id}', [TipoMaterialController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cad-tipo-material/alterar/{id}', [TipoMaterialController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cad-tipo-material/atualizar/{id}', [TipoMaterialController::class, 'update'])->middleware('validaUsuario');



Route::name('localizador')->middleware('validaUsuario')->group(function () {
    Route::get('/localizador', [LocalizadorController::class, 'index']);
    Route::post('/localizador/inserir', [LocalizadorController::class, 'store']);
    Route::get('/localizador/excluir/{id}', [LocalizadorController::class, 'destroy']);
    Route::get('/localizador/alterar/{id}', [LocalizadorController::class, 'edit']);
    Route::put('/localizador/atualizar/{id}', [LocalizadorController::class, 'update']);
});

Route::get('/fase-etaria', [FaseEtariaController::class, 'index'])->middleware('validaUsuario');
Route::post('/fase-etaria/inserir', [FaseEtariaController::class, 'store'])->middleware('validaUsuario');
Route::get('/fase-etaria/excluir/{id}', [FaseEtariaController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/fase-etaria/alterar/{id}', [FaseEtariaController::class, 'edit'])->middleware('validaUsuario');
Route::put('/fase-etaria/atualizar/{id}', [FaseEtariaController::class, 'edit'])->middleware('validaUsuario');

Route::name('deposito')->middleware('validaUsuario')->group(function () {
    Route::get('/deposito', [DepositoController::class, 'index']);
    Route::post('/deposito/inserir', [DepositoController::class, 'store']);
    Route::get('/deposito/excluir/{id}', [DepositoController::class, 'destroy']);
    Route::get('/deposito/alterar/{id}', [DepositoController::class, 'edit']);
    Route::put('/deposito/atualizar/{id}', [DepositoController::class, 'update']);
});

Route::get('/combo/catItem/{id}', [CadastroInicialController::class, 'getCategoria'])->middleware('validaUsuario');
Route::get('/combo/catForm/{id}', [CadastroInicialController::class, 'getFormCadastro'])->middleware('validaUsuario');
Route::get('/combo/valor/{id}', [CadastroInicialController::class, 'getValor'])->middleware('validaUsuario');
Route::get('/combo/catFormFinal/{id}', [CadastroInicialController::class, 'getFormCadastroFinal'])->middleware('validaUsuario');
Route::get('/combo/catValVariado/{id}', [CadastroInicialController::class, 'getValorVariado'])->middleware('validaUsuario');
Route::get('/combo/composicao/{id}', [CadastroInicialController::class, 'getComposicao'])->middleware('validaUsuario');
Route::post('/cad-inicial-material/inserir', [CadastroInicialController::class, 'store'])->middleware('validaUsuario');
Route::get('/usuario-logado', [CadastroInicialController::class, 'search']);

Route::get('/gerenciar-cadastro-inicial', [CadastroInicialController::class, 'index'])->name('cadastroinicial');
Route::get('/gerenciar-cadastro-inicial/incluir', [CadastroInicialController::class, 'create'])->middleware('validaUsuario');
Route::get('/gerenciar-cadastro-inicial/excluir/{id}', [CadastroInicialController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/editar-cadastro-inicial/{id}/{id_cat}', [CadastroInicialController::class, 'formEditar'])->middleware('validaUsuario');
Route::put('/gerenciar-cadastro-inicial/alterar/{id}', [CadastroInicialController::class, 'update'])->middleware('validaUsuario');

Route::get('/combo/tamanho/{id}', [CadastroInicialController::class, 'getTamanho'])->middleware('validaUsuario');
Route::get('/combo/embalagem/{id}', [CadastroInicialController::class, 'getEmbalagem'])->middleware('validaUsuario');



Route::get('/barcode', [BarcodeController::class, 'index'])->middleware('validaUsuario')->name('codbarras');
Route::get('/item_material/{id}', [BarcodeController::class, 'show'])->middleware('validaUsuario');


Route::name('vendas')->middleware('validaUsuario')->group(function () {
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






Route::name('pagamentos')->middleware('validaUsuario')->group(function () {});


Route::get('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'show'])->name('pagamento.show');
Route::post('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'inserir'])->middleware('validaUsuario');
Route::delete('/gerenciar-pagamentos/{id}', [GerenciarpagamentoController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/alerta-pagamento', [GerenciarpagamentoController::class, 'inserir']);




Route::get('/cad-pagamento', [TipoPagamentoController::class, 'index'])->middleware('validaUsuario');
Route::post('/cad-pagamento/inserir', [TipoPagamentoController::class, 'store'])->middleware('validaUsuario');
Route::get('/cad-pagamento/excluir/{id}', [TipoPagamentoController::class, 'destroy'])->middleware('validaUsuario');
Route::get('/cad-pagamento/alterar/{id}', [TipoPagamentoController::class, 'edit'])->middleware('validaUsuario');
Route::put('/cad-pagamento/atualizar/{id}', [TipoPagamentoController::class, 'update'])->middleware('validaUsuario');

Route::name('relatorios')->middleware('validaUsuario')->group(function () {
    Route::get('/demonstrativo/{id}', [GerenciardemonstrativoController::class, 'index'])->middleware('validaUsuario');
    Route::get('/relatorio-vendas', [RelatoriosController::class, 'index'])->middleware('validaUsuario');
    Route::get('/relatorio-entrada', [RelatoriosController::class, 'entrada'])->middleware('validaUsuario');
    Route::get('/relatorio-saidas', [RelatoriosController::class, 'saida'])->middleware('validaUsuario');
    Route::get('/inventarios', [GerenciarInventariosController::class, 'index'])->middleware('validaUsuario');
    Route::get('/venda-valor', [RelatoriosController::class, 'vendas'])->middleware('validaUsuario');
});

Route::name('valor-avariado')->middleware('validaUsuario')->group(function () {
    Route::get('/cad-valor-avariado', [RegistrarAvariaController::class, 'index'])->middleware('validaUsuario')->name('cadavaria.index');
    Route::post('/cad-valor-avariado/inserir', [RegistrarAvariaController::class, 'insert'])->middleware('validaUsuario');
    Route::get('/cad-valor-avariado/excluir/{id}', [RegistrarAvariaController::class, 'destroy'])->middleware('validaUsuario');
    Route::get('/cad-valor-avariado/alterar/{id}', [RegistrarAvariaController::class, 'edit'])->middleware('validaUsuario');
    Route::any('/alterar-valor-avariado/atualizar/{id}', [RegistrarAvariaController::class, 'update'])->middleware('validaUsuario');
});

Route::name('descontos')->middleware('validaUsuario')->group(function () {
    Route::get('/gerenciar-desconto', [DescontoController::class, 'index'])->middleware('validaUsuario');
    Route::get('/criar-desconto', [DescontoController::class, 'create'])->middleware('validaUsuario');
    Route::post('/incluir-desconto', [DescontoController::class, 'store'])->middleware('validaUsuario');
    Route::get('/desconto-alterar/{id}', [DescontoController::class, 'edit'])->middleware('validaUsuario');
    Route::post('/modifica-desconto/{id}', [DescontoController::class, 'update'])->middleware('validaUsuario');
    Route::get('/desconto/excluir/{id}', [DescontoController::class, 'destroy'])->middleware('validaUsuario');
    Route::get('/desconto/ativar/{id}', [DescontoController::class, 'active'])->middleware('validaUsuario');
    Route::get('/desconto/inativar/{id}', [DescontoController::class, 'inactive'])->middleware('validaUsuario');
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
Route::any('/atualizar-aquisicao-servicos/{id}', [AquisicaoServicosController::class, 'update'])->name('atualizar-aquisicao-servico');
Route::get('/aprovar-aquisicao-servicos/{idSolicitacao}', [AquisicaoServicosController::class, 'aprovar']);
Route::post('/validaAprovacao-aquisicao-servicos', [AquisicaoServicosController::class, 'validaAprovacao']);




//Catálogo de Empresas
Route::get('/catalogo-empresa', [CatalogoEmpresaController::class, 'index'])->name('empresa.index');
Route::get('/incluir-empresa', [CatalogoEmpresaController::class, 'create']);
Route::post('/salvar-empresa', [CatalogoEmpresaController::class, 'store']);
Route::get('/retorna-cidade-dados-residenciais/{id}', [CatalogoEmpresaController::class, 'retornaCidadeDadosResidenciais']);
Route::get('/editar-empresa', [CatalogoEmpresaController::class, 'edit']);



//CadastroDeDocumentos
Route::get('/gerenciar-documentos', [DocumentoController::class, 'index'])->name('gerenciar-documentos');
