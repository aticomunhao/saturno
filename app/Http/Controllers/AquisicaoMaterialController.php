<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatalogoMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolMaterial;
use App\Models\TipoCategoriaMt;
use App\Models\TipoStatusSolMt;
use App\Models\Setor;
use App\Models\ModelCor;
use App\Models\Documento;
use App\Models\ModelFaseEtaria;
use App\Models\ModelMarca;
use App\Models\ModelSexo;
use App\Models\ModelTamanho;
use App\Models\Empresa;
use App\Models\ItemCatalogoMaterial;
use App\Models\MatProposta;
use App\Models\ModelUnidadeMedida;
use App\Models\ModelPessoa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


use function Laravel\Prompts\select;

class AquisicaoMaterialController extends Controller
{

    public function index(Request $request)
    {

        $usuario = session('usuario.id_usuario');
        $setor = session('usuario.setor');
        $excluirSol = $request->excluirSol;
        $sol = SolMaterial::find($excluirSol);

        //dd($setor);
        $query = solMaterial::with(['matProposta', 'tipoStatus', 'setor']);

        if ($request->status_material) {
            $query->where('status', $request->status_material);
        }
        if ($request->classe) {
            $query->where('id_classe_mt', $request->classe);
        }
        if ($request->servicos) {
            $query->where('id_tp_mt', $request->servicos);
        }
        if ($request->setor) {
            $query->where('id_setor', $request->setor);
        }

        $aquisicao = $query->orderBy('prioridade', 'asc')->orderBy('id', 'asc')->paginate(20);

        //dd($aquisicao);

        $status = TipoStatusSolMt::all();

        $categoriaAquisicao = TipoCategoriaMt::all();
        $todosSetor = Setor::orderBy('nome')->get();

        $prioridadesExistentes = SolMaterial::pluck('prioridade')->unique()->toArray();

        // Se existirem prioridades, encontra a maior e adiciona 1
        if (!empty($prioridadesExistentes)) {
            $maiorPrioridade = max($prioridadesExistentes);
            $numeros = range(1, $maiorPrioridade + 1); // Gera uma lista de 1 até a maior prioridade + 1
        } else {
            // Se não houver prioridades, você pode definir o range inicial como desejado, por exemplo, 1
            $numeros = range(1, 1);
        }


        return view('solMaterial.gerenciar-aquisicao-material', compact('sol', 'aquisicao', 'categoriaAquisicao', 'status', 'todosSetor', 'numeros', 'usuario', 'setor'));
    }

    public function retornaNomeMateriais($idClasse)
    {
        $materiais = DB::table('catalogo_materiais')
            ->where('id_cl_mt', $idClasse)
            ->select('id', 'descricao')
            ->get();


        // dd($cidadeDadosResidenciais);

        return response()->json($materiais);
    }
    private function reorganizarPrioridades()
    {
        // Obtém todas as solicitações com prioridade, ordenadas pela prioridade
        $solicitacoes = SolMaterial::whereNotNull('prioridade')
            ->orderBy('prioridade')
            ->get();

        $prioridadeAtual = 1;

        foreach ($solicitacoes as $solicitacao) {
            // Ajusta a prioridade para que seja sequencial
            if ($solicitacao->prioridade != $prioridadeAtual) {
                $solicitacao->prioridade = $prioridadeAtual;
                $solicitacao->save();
            }
            $prioridadeAtual++;
        }
    }
    public function aprovarEmLote(Request $request)
    {
        $usuario = session('usuario.id_usuario');
        $prioridades = $request->input('prioridade');
        $materiais = $request->input('setor');

        $this->processarLote($prioridades, $materiais, [
            'status' => 3,
            'aut_usu_adm' => $usuario,
            'dt_usu_adm' => now(),
        ]);

        app('flasher')->addSuccess('Solicitações aprovadas com sucesso');
        return redirect('/gerenciar-aquisicao-material');
    }

    public function homologarEmLote(Request $request)
    {
        $usuario = session('usuario.id_usuario');
        $prioridades = $request->input('prioridade');
        $materiais = $request->input('setor');

        $this->processarLote($prioridades, $materiais, [
            'status' => 3,
            'aut_usu_pres' => $usuario,
            'dt_usu_pres' => now(),
        ]);

        app('flasher')->addSuccess('Solicitações homologadas com sucesso');
        return redirect('/gerenciar-aquisicao-material');
    }

    private function processarLote($prioridades, $materiais, array $camposAdicionais)
    {
        foreach ($prioridades as $id => $novaPrioridade) {
            if (isset($materiais[$id]) && isset($novaPrioridade)) {
                $solicitacao = SolMaterial::find($id);

                if ($solicitacao) {
                    $prioridadeAtual = $solicitacao->prioridade;

                    // Verifica se aut_usu_pres é nulo antes de alterar a prioridade
                    if (is_null($solicitacao->aut_usu_pres)) {
                        // Ajuste das prioridades intermediárias se houver alteração
                        if ($novaPrioridade != $prioridadeAtual) {
                            if ($novaPrioridade > $prioridadeAtual) {
                                // Reduz prioridades entre a atual e a nova
                                SolMaterial::whereBetween('prioridade', [$prioridadeAtual + 1, $novaPrioridade])
                                    ->decrement('prioridade');
                            } elseif ($novaPrioridade < $prioridadeAtual) {
                                // Aumenta prioridades entre a nova e a atual
                                SolMaterial::whereBetween('prioridade', [$novaPrioridade, $prioridadeAtual - 1])
                                    ->increment('prioridade');
                            }

                            // Atualiza a prioridade apenas se a condição for atendida
                            $solicitacao->update(['prioridade' => $novaPrioridade]);
                        }
                    }

                    // Atualiza os outros campos conforme os parâmetros fornecidos
                    $solicitacao->update(array_merge([
                        'id_resp_mt' => $materiais[$id],
                    ], $camposAdicionais));
                }
            }
        }

        // Reorganização das prioridades após as atualizações
        $this->reorganizarPrioridades();
    }
    public function create(Request $request)
    {
        $setor = session('usuario.setor');
        $idPessoa = session('usuario.id_pessoa');

        $buscaPessoa = ModelPessoa::find($idPessoa);
        $buscaSetor = Setor::whereIn('id', $setor)->get();

        return view('solMaterial.incluir-aquisicao-material', compact('buscaSetor', 'buscaPessoa'));
    }
    public function store(Request $request)
    {

        $idUsuario = session('usuario.id_pessoa');
        //dd($setor);

        $solicitacaoMaterial = SolMaterial::create([
            'data' => Carbon::now(),
            'id_setor' => $request->idSetor,
            'motivo' => $request->motivo,
            'status' => '1',
            'id_resp_mt' => $idUsuario,
            'tipo_sol_material' => '1',
        ]);

        app('flasher')->addSuccess('Solicitação Criada com Sucesso, Adicione os materiais Necessários');
        return redirect("/incluir-aquisicao-material-2/{$solicitacaoMaterial->id}");
    }
    public function create2($id)
    {
        $idSolicitacao = $id;

        $documentos = Documento::where('id_sol_mat', $idSolicitacao)->with('empresa')->get();
        //dd($documentos);
        $solicitacao = SolMaterial::with('modelPessoa', 'setor')->find($idSolicitacao);
        $setor = session('usuario.setor');
        $buscaCategoria = TipoCategoriaMt::all();
        $buscaEmpresa = Empresa::all();
        $buscaMarca = ModelMarca::all();
        $buscaTamanho = ModelTamanho::all();
        $buscaCor = ModelCor::all();
        $buscaFaseEtaria = ModelFaseEtaria::all();
        $buscaSexo = ModelSexo::all();
        $bucaItemCatalogo = ItemCatalogoMaterial::all();
        $buscaUnidadeMedida = ModelUnidadeMedida::all();
        $buscaSetor = Setor::whereIn('id', $setor)->get();
        $materiais = MatProposta::with('documentoMaterial', 'tipoUnidadeMedida', 'tipoItemCatalogoMaterial', 'tipoCategoria', 'tipoMarca', 'tipoTamanho', 'tipoCor', 'tipoFaseEtaria', 'tipoSexo')->where('id_sol_mat', $id)->get();
        //dd($materiais);

        //dd($documentoMaterial);

        return view('solMaterial.incluir-aquisicao-material-2', compact('documentos', 'solicitacao', 'bucaItemCatalogo', 'materiais', 'idSolicitacao', 'buscaSetor', 'buscaUnidadeMedida', 'buscaCategoria', 'buscaMarca', 'buscaTamanho', 'buscaCor', 'buscaFaseEtaria', 'buscaSexo', 'buscaEmpresa'));
    }
    public function store2(Request $request, $id)
    {
        $idSolicitacao = $id;

        MatProposta::create([
            'id_marca' => $request->marcaMaterial,
            'id_tamanho' => $request->tamanhoMaterial,
            'id_cor' => $request->corMaterial,
            'id_fase_etaria' => $request->faseEtariaMaterial,
            'id_sexo' => $request->sexoMaterial,
            'dt_cadastro' => Carbon::now(),
            'id_sol_mat' => $idSolicitacao,
            'id_tipo_item_catalogo' => $request->nomeMaterial,
            'id_cat_material' => $request->categoriaMaterial,
            'id_tipo_unidade_medida' => $request->UnidadeMedidaMaterial,
            'quantidade' => $request->quantidadeMaterial,
            'id_tipo_situacao' => '0',
            'nome' => $request->nomeMaterial,
        ]);

        app('flasher')->addSuccess('Material Adicionado com Sucesso');
        return redirect("/incluir-aquisicao-material-2/{$idSolicitacao}");
    }
    public function getMarcas($categoriaId)
    {
        $marcas = ModelMarca::where('id_categoria_material', $categoriaId)->get(['id', 'nome']);
        return response()->json($marcas);
    }

    public function getTamanhos($categoriaId)
    {
        $tamanhos = ModelTamanho::where('id_categoria_material', $categoriaId)->get(['id', 'nome']);
        return response()->json($tamanhos);
    }

    public function getCores($categoriaId)
    {
        $cores = ModelCor::where('id_categoria_material', $categoriaId)->get(['id', 'nome']);
        return response()->json($cores);
    }

    public function getFases($categoriaId)
    {
        $fases = ModelFaseEtaria::where('id_categoria_material', $categoriaId)->get(['id', 'nome']);
        return response()->json($fases);
    }
    public function getNomes($categoriaId)
    {
        $nomes = itemCatalogoMaterial::where('id_categoria_material', $categoriaId)->get(['id', 'nome']);
        return response()->json($nomes);
    }
    public function destroyMaterial(Request $request)
    {
        // Busca e exclusão do material
        $material = MatProposta::find($request->material_id);

        if ($material) {
            $material->delete();

            // Retorna sucesso
            app('flasher')->addSuccess('Material excluído com sucesso!');
            return redirect()->back();
        }

        // Caso o material não seja encontrado
        app('flasher')->addError('Material não encontrado.');
        return redirect()->back();
    }
    public function store3(Request $request, $id)
    {
        // Função para limpar o valor monetário
        function limparValor($valor)
        {
            return $valor !== null ? str_replace(['R$', ',', ' '], ['', '', ''], $valor) : null;
        }

        //dd($request->all());
        $idSolicitacoes = $id;
        //dd($id);
        $materiais = MatProposta::where('id_sol_mat', $idSolicitacoes)->get();
        $materiaisIds = $materiais->pluck('id');
        $documentoMaterial = Documento::whereIn('mat_proposta', $materiaisIds)->get();
        $solicitacao = SolMaterial::find($idSolicitacoes);
        //dd($solicitacao, $materiais, $solicitacao);
        if ($request->activeButton === 'material') {

            SolMaterial::where('id', $id)->update([
                'tipo_sol_material' => '2',
            ]);

            foreach ($materiais as $index => $material) {
                // Verifica se os índices existem no request antes de atualizar
                $data = [
                    'id_cat_material' => $request->categoriaPorMaterial[$index],
                    'nome' => $request->nomePorMaterial[$index],
                    'id_tipo_unidade_medida' => $request->UnidadeMedidaPorMaterial[$index],
                    'quantidade' => $request->quantidadePorMaterial1[$index],
                    'id_marca' => $request->marcaPorMaterial[$index],
                    'id_tamanho' => $request->tamanhoPorMaterial[$index],
                    'id_cor' => $request->corPorMaterial[$index],
                    'id_fase_etaria' => $request->faseEtariaPorMaterial[$index],
                    'id_sexo' => $request->sexoPorMaterial[$index]
                ];

                // Atualiza apenas se houver dados a modificar
                if (!empty($data)) {
                    MatProposta::where('id', $material->id)->update($data);
                }

                $documentosFiltrados = array_filter($request->razaoSocial1, function ($doc, $index) use ($request, $material) {
                    return $request->numMat[$index] == $material->id;
                }, ARRAY_FILTER_USE_BOTH);

                // Itera sobre os três documentos para o material
                foreach ($documentosFiltrados as $index => $documento) {
                    //dd($request->all());
                    // Verifica se o arquivo foi enviado e armazena-o
                    $endArquivo1 = $request->hasFile("arquivoProposta1.$index")
                        ? $request->file("arquivoProposta1.$index")->store('documentos', 'public')
                        : $material->arquivo_proposta_1 ?? null;

                    $dadosComunsMaterial1 = [];

                    if (!empty($request->dt_inicial1[$index])) {
                        $dadosComunsMaterial1['dt_doc'] = $request->dt_inicial1[$index];
                    }
                    if (!empty($request->valor1[$index])) {
                        $dadosComunsMaterial1['valor'] = limparValor($request->valor1[$index]);
                    }
                    if (!empty($request->razaoSocial1[$index])) {
                        $dadosComunsMaterial1['id_empresa'] = $request->razaoSocial1[$index];
                    }
                    if (!empty($request->dt_final1[$index])) {
                        $dadosComunsMaterial1['dt_validade'] = $request->dt_final1[$index];
                    }
                    if (!empty($request->numero1[$index])) {
                        $dadosComunsMaterial1['numero'] = $request->numero1[$index];
                    }
                    if (!empty($request->tempoGarantia1[$index])) {
                        $dadosComunsMaterial1['tempo_garantia_dias'] = $request->tempoGarantia1[$index];
                    }
                    if (!empty($request->linkProposta1[$index])) {
                        $dadosComunsMaterial1['link_proposta'] = $request->linkProposta1[$index];
                    }
                    if (!empty($endArquivo1)) {
                        $dadosComunsMaterial1['end_arquivo'] = $endArquivo1;
                    }

                    $dadosComuns = array_merge([
                        'id_tp_doc' => '14',
                        'id_setor' => $solicitacao->id_setor,
                        'vencedor_inicial' => '1',
                        'mat_proposta' => $material->id,
                        'vencedor_geral' => '0',
                        'id_sol_mat' => $id,
                    ], $dadosComunsMaterial1);

                    // Busca documento existente considerando a empresa e o número
                    $documentoQuery = Documento::where('mat_proposta', $material->id)
                        ->where('id_tp_doc', '14');

                    if (!empty($dadosComuns['numero'])) {
                        $documentoQuery->where('numero', $dadosComuns['numero']);
                    }

                    if (!empty($dadosComuns['id_empresa'])) {
                        $documentoQuery->where('id_empresa', $dadosComuns['id_empresa']);
                    }

                    $documento = $documentoQuery->first();

                    if ($documento) {
                        $documento->update($dadosComuns);
                    } else {
                        Documento::create($dadosComuns);
                    }
                }
            }
        } else if ($request->activeButton === 'empresa') {

            SolMaterial::where('id', $idSolicitacoes)->update([
                'tipo_sol_material' => '1',
            ]);
            foreach ($materiais as $index => $material) {
                // Construção do array de atualização verificando a existência dos índices
                $data = [
                    'id_cat_material' => $request->categoriaPorEmpresa[$index],
                    'nome' => $request->nomePorEmpresa[$index],
                    'id_tipo_unidade_medida' => $request->UnidadeMedidaPorEmpresa[$index],
                    'quantidade' => $request->quantidadePorEmpresa[$index],
                    'valor1' => limparValor($request->valorUnitarioEmpresa1[$index]),
                    'valor2' => limparValor($request->valorUnitarioEmpresa2[$index]),
                    'valor3' => limparValor($request->valorUnitarioEmpresa3[$index]),
                    'id_marca' => $request->marcaPorEmpresa[$index],
                    'id_tamanho' => $request->tamanhoPorEmpresa[$index],
                    'id_cor' => $request->corPorEmpresa[$index],
                    'id_fase_etaria' => $request->faseEtariaPorEmpresa[$index],
                    'id_sexo' => $request->sexoPorEmpresa[$index]
                ];

                // Atualiza apenas se houver dados a modificar
                if (!empty($data)) {
                    MatProposta::where('id', $material->id)->update($data);
                }
            }

            $documentos = Documento::where('id_sol_mat', $idSolicitacoes)->get();

            foreach ($documentos as $index => $documento) {
                $realIndex = $index + 1;

                $endArquivoPorEmpresa = $request->hasFile("arquivoPropostaPorEmpresa.$realIndex")
                    ? $request->file("arquivoPropostaPorEmpresa.$realIndex")->store('documentos', 'public')
                    : $documento->end_arquivo ?? null;

                $dadosDocumento = [];

                if (!empty($request->dt_inicialPorEmpresa[$realIndex])) {
                    $dadosDocumento['dt_doc'] = $request->dt_inicialPorEmpresa[$realIndex];
                }
                if (!empty($request->valorPorEmpresa[$realIndex])) {
                    $dadosDocumento['valor'] = limparValor($request->valorPorEmpresa[$realIndex]);
                }
                if (!empty($request->razaoSocialPorEmpresa[$realIndex])) {
                    $dadosDocumento['id_empresa'] = $request->razaoSocialPorEmpresa[$realIndex];
                }
                if (!empty($request->dt_finalPorEmpresa[$realIndex])) {
                    $dadosDocumento['dt_validade'] = $request->dt_finalPorEmpresa[$realIndex];
                }
                if (!empty($request->numeroPorEmpresa[$realIndex])) {
                    $dadosDocumento['numero'] = $request->numeroPorEmpresa[$realIndex];
                }
                if (!empty($request->tempoGarantiaPorEmpresa[$realIndex])) {
                    $dadosDocumento['tempo_garantia_dias'] = $request->tempoGarantiaPorEmpresa[$realIndex];
                }
                if (!empty($request->linkPropostaPorEmpresa[$realIndex])) {
                    $dadosDocumento['link_proposta'] = $request->linkPropostaPorEmpresa[$realIndex];
                }
                if (!empty($endArquivoPorEmpresa)) {
                    $dadosDocumento['end_arquivo'] = $endArquivoPorEmpresa;
                }

                $dadosComuns = array_merge([
                    'id_tp_doc' => '14',
                    'id_setor' => $solicitacao->id_setor,
                    'vencedor_inicial' => '1',
                    'id_sol_mat' => $idSolicitacoes,
                    'vencedor_geral' => '0',
                ], $dadosDocumento);

                // Se houver documentos, faz update. Se não houver, cria um novo.
                if ($documentos->count() > 0) {
                    Documento::where('id', $documento->id)->update($dadosComuns);
                } else {
                    Documento::create($dadosComuns);
                }
            }
        }

        app('flasher')->addSuccess('Propostas Realizadas com Sucesso');
        return redirect("/gerenciar-aquisicao-material");
    }
    public function delete($id)
    {
        $solicitacao = SolMaterial::find($id);

        if ($solicitacao) {
            $solicitacao->delete();
            app('flasher')->addSuccess('Solicitação excluída com sucesso');
        } else {
            app('flasher')->addError('Solicitação não encontrada');
        }

        return redirect('/gerenciar-aquisicao-material');

    }
}
