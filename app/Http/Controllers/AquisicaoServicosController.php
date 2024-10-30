<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatalogoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SolServico;
use App\Models\TipoClasseSv;
use App\Models\TipoStatusSolSv;
use App\Models\Setor;
use App\Models\Documento;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


use function Laravel\Prompts\select;

class AquisicaoServicosController extends Controller
{

    public function index(Request $request)
    {

        $query = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor']);

        if ($request->status_servico) {
            $query->where('status', $request->status_servico);
        }
        if ($request->classe) {
            $query->where('id_classe_sv', $request->classe);
        }
        if ($request->servicos) {
            $query->where('id_tp_sv', $request->servicos);
        }

        $aquisicao = $query->orderBy('prioridade')->paginate(20);

        //dd($aquisicao);

        $status = TipoStatusSolSv::all();
        $classeAquisicao = TipoClasseSv::all();
        $todosSetor = Setor::orderBy('nome')->get();

        $prioridadesExistentes = SolServico::pluck('prioridade')->unique()->toArray();

        // Se existirem prioridades, encontra a maior e adiciona 1
        if (!empty($prioridadesExistentes)) {
            $maiorPrioridade = max($prioridadesExistentes);
            $numeros = range(1, $maiorPrioridade + 1); // Gera uma lista de 1 até a maior prioridade + 1
        } else {
            // Se não houver prioridades, você pode definir o range inicial como desejado, por exemplo, 1
            $numeros = range(1, 1);
        }


        return view('solServico.gerenciar-aquisicao-servicos', compact('aquisicao', 'classeAquisicao', 'status', 'todosSetor', 'numeros'));
    }

    public function retornaNomeServicos($idClasse)
    {
        $servicos = DB::table('catalogo_servico')
            ->where('id_cl_sv', $idClasse)
            ->select('id', 'descricao')
            ->get();


        // dd($cidadeDadosResidenciais);

        return response()->json($servicos);
    }

    public function create(Request $request)
    {

        $setor = session()->get('usuario.setor', 'cpf');
        //dd($setor);

        $buscaSetor = Setor::whereIn('id', $setor)->get();
        $servico = SolServico::all();
        $classeAquisicao = TipoClasseSv::all();
        $empresas = Documento::all();
        $buscaEmpresa = Empresa::all();
        //dd($classeAquisicao, $empresas, $servico, $buscaSetor);

        // Adiciona a URL completa do arquivo
        foreach ($empresas as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('solServico.incluir-aquisicao-servicos', compact('servico', 'classeAquisicao', 'setor', 'buscaSetor', 'buscaEmpresa', 'empresas'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'dt_final.*' => 'nullable|date|after_or_equal:dt_inicial.*',
        ]);

        // Se a validação falhar, retorna os erros
        if ($validator->fails()) {
            app('flasher')->addError('A data limite do documento não pode ser anterior a data inicial.');
            return back()->withErrors($validator)->withInput();
        }

        $today = Carbon::today()->format('Y-m-d');

        DB::beginTransaction();
        try {


            $solicitacao = SolServico::create([
                'id_classe_sv' => $request->classeSv,
                'id_tp_sv' => $request->tipoServicos,
                'motivo' => $request->motivo,
                'data' => $today,
                'status' => '1',
                'id_setor' => $request->idSetor,
            ]);

            foreach ($request->numero as $index => $numero) {
                // Armazena o arquivo se existir
                $endArquivo = $request->hasFile('arquivo.' . $index)
                    ? $request->file('arquivo.' . $index)->store('documentos', 'public')
                    : null;

                Documento::create([
                    'numero' => $numero,
                    'dt_doc' => $request->dt_inicial[$index],
                    'id_tp_doc' => '14', // Considere alterar para uma constante ou buscar no banco
                    'valor' => $request->valor[$index],
                    'id_empresa' => $request->razaoSocial[$index],
                    'id_setor' => $request->input('idSetor'),
                    'dt_validade' => $request->dt_final[$index],
                    'end_arquivo' => $endArquivo,
                    'id_sol_sv' => $solicitacao->id,
                ]);
            }

            DB::commit();
            app('flasher')->addSuccess('Solicitação e documentos salvos com sucesso!');
            return redirect('/gerenciar-aquisicao-servicos');
        } catch (\Exception $e) {
            DB::rollBack();
            app('flasher')->addError('Ocorreu um erro ao salvar a solicitação.');
            return back()->withErrors(['error' => 'Ocorreu um erro ao salvar a solicitação.']);
        }
    }


    public function edit($idS)
    {
        $buscaEmpresa = Empresa::all();
        $solicitacao = SolServico::findOrFail($idS);
        $documentos = Documento::where('id_sol_sv', $idS)->get();
        $tiposServico = CatalogoServico::where('id_cl_sv', $solicitacao->id_classe_sv)->get();
        $classeAquisicao = TipoClasseSv::all();
        $buscaSetor = Setor::all();

        // Adiciona a URL completa do arquivo
        foreach ($documentos as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('solServico.editar-aquisicao-servicos', compact('solicitacao', 'buscaEmpresa', 'documentos', 'classeAquisicao', 'buscaSetor', 'tiposServico'));
    }


    public function update(Request $request, $id)
    {
        // Validação dos campos
        $request->validate([
            'classeSv' => 'required',
            'tipoServicos' => 'required',
            'motivo' => 'required|string',
            'numero.*' => 'required|string',
            'valor.*' => 'required|numeric',
            'dt_inicial.*' => 'required|date',
            'arquivo.*' => 'nullable|file|mimes:pdf,doc,docx',
            'arquivoOld.*' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $setor = session()->get('usuario.setor')[0];

        DB::beginTransaction();
        try {
            // Encontrar a solicitação
            $solicitacao = SolServico::findOrFail($id);

            // Atualizar dados da solicitação
            $solicitacao->update([
                'id_classe_sv' => $request->input('classeSv'),
                'id_tp_sv' => $request->input('tipoServicos'),
                'motivo' => $request->input('motivo'),
            ]);

            // Atualizar os documentos existentes com novos arquivos (arquivoOld)
            if ($request->hasFile('arquivoOld')) {
                foreach ($request->file('arquivoOld') as $index => $file) {
                    if ($file) {
                        // Obter caminho do arquivo
                        $path = $file->store('propostas', 'public');

                        // Atualizar o documento existente
                        $documento = Documento::find($request->input('documento_id')[$index]);
                        if ($documento) {
                            $documento->update([
                                'end_arquivo' => $path,
                            ]);
                        }
                    }
                }
            }

            // Adicionar novos documentos (arquivo)
            if ($request->hasFile('arquivo') && is_array($request->file('arquivo'))) {
                foreach ($request->file('arquivo') as $index => $file) {
                    if ($file) {
                        // Obter o caminho do arquivo
                        $path = $file->store('propostas', 'public');

                        // Criar um novo documento
                        $solicitacao->documentos()->create([
                            'end_arquivo' => $path,
                            'numero' => $request->input('numero')[$index],
                            'dt_doc' => $request->input('dt_inicial')[$index],
                            'valor' => $request->input('valor')[$index],
                            'id_empresa' => $request->input('razaoSocial')[$index],
                            'dt_validade' => $request->input('dt_final')[$index],
                            'id_tp_doc' => '14',
                            'id_setor' => $setor,
                        ]);
                    }
                }
            }

            DB::commit();
            app('flasher')->addSuccess('Solicitação modificada com sucesso!');
            return redirect('/gerenciar-aquisicao-servicos');
        } catch (\Exception $e) {
            DB::rollBack();
            app('flasher')->addError('Ocorreu um erro ao atualizar a solicitação.');
            return back()->withErrors(['error' => 'Ocorreu um erro ao atualizar a solicitação.']);
        }
    }

    public function aprovar($idSolicitacao)
    {

        $aquisicao = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor'])
            ->where('id', $idSolicitacao)
            ->first();

        // Recupera todas as prioridades existentes
        $prioridadesExistentes = SolServico::pluck('prioridade')->unique()->toArray();

        // Se existirem prioridades, encontra a maior e adiciona 1
        if (!empty($prioridadesExistentes)) {
            $maiorPrioridade = max($prioridadesExistentes);
            $numeros = range(1, $maiorPrioridade + 1); // Gera uma lista de 1 até a maior prioridade + 1
        } else {
            // Se não houver prioridades, você pode definir o range inicial como desejado, por exemplo, 1
            $numeros = range(1, 1);
        }

        $todosSetor = Setor::orderBy('nome')->get();

        $empresas = Documento::where('id_sol_sv', $idSolicitacao)->get();

        $documentos = Documento::where('id_sol_sv', $idSolicitacao)->get();

        // Adiciona a URL completa do arquivo
        foreach ($empresas as $empresa) {
            if ($empresa->end_arquivo) {
                $empresa->arquivo_url = Storage::url($empresa->end_arquivo);
            }
        }


        return view('solServico.aprovar-aquisicao-servicos', compact('aquisicao', 'numeros', 'todosSetor', 'empresas'));
    }

    public function validaAprovacao(Request $request)
    {

        $usuario = session('usuario.id_usuario');
        // Obtém o valor do ID da solicitação
        $aquisicaoId = $request->input('solicitacao_id');

        // Busca a aquisição no banco de dados
        $aquisicao = SolServico::find($aquisicaoId);

        $novaPrioridade = $aquisicao->aut_usu_pres ?? $request->input('prioridade');

        // Verifica se a aquisição foi encontrada
        if (!$aquisicao) {
            app('flasher')->addError('Solicitação não encontrada.');
            return redirect('/gerenciar-aquisicao-servicos');
        }

        // Obtém o status enviado pelo formulário
        $status = $request->input('status');

        // Atualiza o status
        $aquisicao->status = $status;

        // Verifica o status e trata cada caso
        if ($status == '3') { // Aprovado

            $prioridadeAtual = $aquisicao->prioridade;

            if ($novaPrioridade > $prioridadeAtual) {
                // Desce as prioridades entre a atual e a nova prioridade
                SolServico::whereBetween('prioridade', [$prioridadeAtual + 1, $novaPrioridade])
                    ->decrement('prioridade');
            } elseif ($novaPrioridade < $prioridadeAtual) {
                // Sobe as prioridades entre a nova e a atual prioridade
                SolServico::whereBetween('prioridade', [$novaPrioridade, $prioridadeAtual - 1])
                    ->increment('prioridade');
            }

            // Define a nova prioridade da solicitação
            $aquisicao->id_resp_sv = $request->input('setorResponsavel');
            $aquisicao->prioridade = $novaPrioridade;

            // Impede que a prioridade fique abaixo de 1
            if ($aquisicao->prioridade < 1) {
                $aquisicao->prioridade = 1;
            }

            // Salva a solicitação
            $aquisicao->aut_usu_adm = $usuario;
            $aquisicao->dt_usu_adm = now();
            $aquisicao->motivo_recusa = null;
            $aquisicao->save();

            // Reorganiza as prioridades para garantir que não haja lacunas
            $this->reorganizarPrioridades();

            app('flasher')->addSuccess('A solicitação foi aprovada.');
        } elseif ($status == '1' || $status == '7') { // Devolver ou Cancelar

            $aquisicao->aut_usu_adm = $usuario;
            $aquisicao->dt_usu_adm = now();
            $aquisicao->id_resp_sv = null;
            $aquisicao->prioridade = null;
            $aquisicao->motivo_recusa = $request->input('motivoRejeicao');
            $aquisicao->save();

            $message = ($status == '1') ? 'A solicitação foi devolvida.' : 'A solicitação foi cancelada.';
            app('flasher')->addWarning($message);
        }

        return redirect('/gerenciar-aquisicao-servicos');

    }
    private function reorganizarPrioridades()
    {
        // Obtém todas as solicitações com prioridade, ordenadas pela prioridade
        $solicitacoes = SolServico::whereNotNull('prioridade')
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

    public function enviar($idS)
    {
        try {

            // Recupera a última prioridade e define a nova como maior + 1
            $ultimaPrioridade = SolServico::max('prioridade');
            $novaPrioridade = $ultimaPrioridade ? $ultimaPrioridade + 1 : 1;

            // Encontra a solicitação pelo ID ou lança uma exceção se não for encontrada
            SolServico::findOrFail($idS)->update([
                'status' => '2',
                'prioridade' => $novaPrioridade,
            ]);

            // Adiciona uma mensagem de sucesso
            app('flasher')->addSuccess('Solicitação enviada com sucesso!');
        } catch (ModelNotFoundException $e) {
            // Adiciona uma mensagem de erro se a solicitação não for encontrada
            app('flasher')->addError('Solicitação não encontrada!');
        }

        // Redireciona para a página de gerenciamento
        return redirect('/gerenciar-aquisicao-servicos');
    }


    public function homologar($id)
    {

        $aquisicao = SolServico::with(['tipoClasse', 'catalogoServico', 'tipoStatus', 'setor'])
            ->where('id', $id)
            ->first();

        // Recupera todas as prioridades existentes
        $prioridadesExistentes = SolServico::pluck('prioridade')->unique()->toArray();

        // Se existirem prioridades, encontra a maior e adiciona 1
        if (!empty($prioridadesExistentes)) {
            $maiorPrioridade = max($prioridadesExistentes);
            $numeros = range(1, $maiorPrioridade + 1); // Gera uma lista de 1 até a maior prioridade + 1
        } else {
            // Se não houver prioridades, você pode definir o range inicial como desejado, por exemplo, 1
            $numeros = range(1, 1);
        }

        $todosSetor = Setor::orderBy('nome')->get();

        $empresas = Documento::where('id_sol_sv', $id)->get();

        $documentos = Documento::where('id_sol_sv', $id)->get();

        // Adiciona a URL completa do arquivo
        foreach ($empresas as $empresa) {
            if ($empresa->end_arquivo) {
                $empresa->arquivo_url = Storage::url($empresa->end_arquivo);
            }
        }

        return view('solServico.homologar-aquisicao-servicos', compact('aquisicao', 'numeros', 'todosSetor', 'empresas'));
    }

    public function validaHomologacao(Request $request)
    {

        $usuario = session('usuario.id_usuario');

        // Obtém o valor do ID da solicitação
        $aquisicaoId = $request->input('solicitacao_id');

        // Busca a aquisição no banco de dados
        $aquisicao = SolServico::find($aquisicaoId);
        $novaPrioridade = $request->input('prioridade');

        // Verifica se a aquisição foi encontrada
        if (!$aquisicao) {
            app('flasher')->addError('Solicitação não encontrada.');
            return redirect('/gerenciar-aquisicao-servicos');
        }

        // Obtém o status enviado pelo formulário
        $status = $request->input('status');

        // Atualiza o status
        $aquisicao->status = $status;

        // Verifica o status e trata cada caso
        if ($status == '3') { // Aprovado

            $prioridadeAtual = $aquisicao->prioridade;

            if ($novaPrioridade > $prioridadeAtual) {
                // Desce as prioridades entre a atual e a nova prioridade
                SolServico::whereBetween('prioridade', [$prioridadeAtual + 1, $novaPrioridade])
                    ->decrement('prioridade');
            } elseif ($novaPrioridade < $prioridadeAtual) {
                // Sobe as prioridades entre a nova e a atual prioridade
                SolServico::whereBetween('prioridade', [$novaPrioridade, $prioridadeAtual - 1])
                    ->increment('prioridade');
            }

            // Define a nova prioridade da solicitação
            $aquisicao->id_resp_sv = $request->input('setorResponsavel');
            $aquisicao->prioridade = $novaPrioridade;

            // Impede que a prioridade fique abaixo de 1
            if ($aquisicao->prioridade < 1) {
                $aquisicao->prioridade = 1;
            }

            // Salva a solicitação
            $aquisicao->aut_usu_pres = $usuario;
            $aquisicao->dt_usu_pres = now();
            $aquisicao->motivo_recusa = null;
            $aquisicao->save();

            // Reorganiza as prioridades para garantir que não haja lacunas
            $this->reorganizarPrioridades();

            app('flasher')->addSuccess('A solicitação foi aprovada.');
        } elseif ($status == '1' || $status == '7') { // Devolver ou Cancelar

            $aquisicao->aut_usu_pres = $usuario;
            $aquisicao->dt_usu_pres = now();
            $aquisicao->id_resp_sv = null;
            $aquisicao->prioridade = null;
            $aquisicao->motivo_recusa = $request->input('motivoRejeicao');
            $aquisicao->save();

            $message = ($status == '1') ? 'A solicitação foi devolvida.' : 'A solicitação foi cancelada.';
            app('flasher')->addWarning($message);
        }

        return redirect('/gerenciar-aquisicao-servicos');
    }
    public function aprovarEmLote(Request $request)
    {
        $usuario = session('usuario.id_usuario');
        $prioridades = $request->input('prioridade');
        $setores = $request->input('setor');

        $this->processarLote($prioridades, $setores, [
            'status' => 3,
            'aut_usu_adm' => $usuario,
            'dt_usu_adm' => now(),
        ]);

        app('flasher')->addSuccess('Solicitações aprovadas com sucesso');
        return redirect('/gerenciar-aquisicao-servicos');
    }

    public function homologarEmLote(Request $request)
    {
        $usuario = session('usuario.id_usuario');
        $prioridades = $request->input('prioridade');
        $setores = $request->input('setor');

        $this->processarLote($prioridades, $setores, [
            'status' => 3,
            'aut_usu_pres' => $usuario,
            'dt_usu_pres' => now(),
        ]);

        app('flasher')->addSuccess('Solicitações homologadas com sucesso');
        return redirect('/gerenciar-aquisicao-servicos');
    }

    private function processarLote($prioridades, $setores, array $camposAdicionais)
    {
        foreach ($prioridades as $id => $novaPrioridade) {
            if (isset($setores[$id]) && isset($novaPrioridade)) {
                $solicitacao = SolServico::find($id);

                if ($solicitacao) {
                    $prioridadeAtual = $solicitacao->prioridade;

                    // Verifica se aut_usu_pres é nulo antes de alterar a prioridade
                    if (is_null($solicitacao->aut_usu_pres)) {
                        // Ajuste das prioridades intermediárias se houver alteração
                        if ($novaPrioridade != $prioridadeAtual) {
                            if ($novaPrioridade > $prioridadeAtual) {
                                // Reduz prioridades entre a atual e a nova
                                SolServico::whereBetween('prioridade', [$prioridadeAtual + 1, $novaPrioridade])
                                    ->decrement('prioridade');
                            } elseif ($novaPrioridade < $prioridadeAtual) {
                                // Aumenta prioridades entre a nova e a atual
                                SolServico::whereBetween('prioridade', [$novaPrioridade, $prioridadeAtual - 1])
                                    ->increment('prioridade');
                            }

                            // Atualiza a prioridade apenas se a condição for atendida
                            $solicitacao->update(['prioridade' => $novaPrioridade]);
                        }
                    }

                    // Atualiza os outros campos conforme os parâmetros fornecidos
                    $solicitacao->update(array_merge([
                        'id_resp_sv' => $setores[$id],
                    ], $camposAdicionais));
                }
            }
        }

        // Reorganização das prioridades após as atualizações
        $this->reorganizarPrioridades();
    }
    public function show($id)
    {
        $solicitacao = SolServico::with('tipoClasse', 'catalogoServico', 'tipoStatus', 'setor')->find($id);
        $documentos = Documento::where('id_sol_sv', $id)->get();

        foreach ($documentos as $documento) {
            if ($documento->end_arquivo) {
                $documento->arquivo_url = Storage::url($documento->end_arquivo);
            }
        }

        return view('solServico.visualizar-aquisicao-servicos', compact('solicitacao', 'documentos'));
    }
}
