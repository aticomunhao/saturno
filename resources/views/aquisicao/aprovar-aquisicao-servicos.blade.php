@extends('layouts.app')

@section('title')
    Aprovar Aquisição de Serviços
@endsection
@section('content')
    <form method="POST" action="/validaAprovacao-aquisicao-servicos/{{ $aquisicao->idSolicitacao }}">{{-- Formulario de Inserção --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Aprovar Aquisição de Serviços
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação do Solicitante</h5>
                            <div class="d-flex gap-3 align-items-end">
                                <div><label>Número da Proposta</label>
                                    <br>
                                    <input class="form-control" style="text-align: center; width: 300px" type="text"
                                        disabled value="{{ $aquisicao->idSolicitacao }}">
                                </div>
                                <div>
                                    <label>Data da Criação</label>
                                    <br>
                                    <input class="form-control" style="text-align: center; width: 300px" type="date"
                                        format="d-m-Y" disabled value="{{ $aquisicao->dataSolicitacao }}">
                                </div>
                                <div>
                                    <label>Setor</label>
                                    <br>
                                    <input class="form-control" style="text-align: center; width: 300px" type="text"
                                        disabled value="{{ $buscaSetor->nomeSetor }}">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h5>Identificação do Serviço</h5>
                            <div class="d-flex gap-3 align-items-end">
                                <div><label>Tipo</label>
                                    <br>
                                    <input class="form-control" style="text-align: center; width: 300px" type="text"
                                        disabled value="{{ $aquisicao->descricaoCatalogo }}">
                                </div>
                                <div>
                                    <label>Data da Criação</label>
                                    <br>
                                    <input class="form-control" style="text-align: center; width: 300px" type="text"
                                        disabled value="{{ $aquisicao->descricaoCatalogo }}">
                                </div>
                                <div>
                                    <label>Prioridade</label>
                                    <br>
                                    <select id="cargoSelect" class="form-select status select2 pesquisa-select"
                                        style="width: 300px;" name="prioridade" required>
                                        @foreach ($numeros as $number)
                                            <option value="{{ $number }}">{{ $number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label>Setor Responsável por Acompanhar</label>
                                    <br>
                                    <select id="cargoSelect" class="form-select status select2 pesquisa-select"
                                        style="width: 300px;" name="setorResponsavel" required>
                                        @foreach ($todosSetor as $todosSetores)
                                            <option value="{{ $todosSetores->id }}">{{ $todosSetores->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" col-12">Motivo
                                <br>
                                <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                    value="" disabled>{{ $aquisicao->motivoServico }}</textarea>
                            </div>
                            <br>
                            <hr>
                            <h5>Propostas Comerciais</h5>
                            <div class="ROW" style="margin-left:5px">
                                @foreach ($empresas as $index => $empresa)
                                    <div style="display: flex; gap: 20px; align-items: flex-end;">
                                        <div class="col-md-3">{{ 0 + 1 }}º Empresa (ID:
                                            {{ $empresa->id_empresa }})
                                            <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                                type="text" name="empresas[{{ $index }}][id_empresa]"
                                                value="{{ $empresa->id_empresa }}" readonly>
                                        </div>
                                        <div class="col-md-3">Valor Orçado
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="border: 1px solid #999999; padding: 5px;">R$</span>
                                                <input type="text" class="form-control"
                                                    name="empresas[{{ $index }}][valor]"
                                                    style="border: 1px solid #999999; padding: 5px;"
                                                    value="{{ $empresa->valor }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">Data Limite do Orçamento
                                            <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                                type="date" name="empresas[{{ $index }}][dt_validade]"
                                                value="{{ $empresa->dt_validade }}" readonly>
                                        </div>
                                        <div class="col-md-3">Arquivo da Proposta
                                            <a href="{{ $empresa->end_arquivo }}" target="_blank">Ver Arquivo</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <hr>
                            <h5>Descrição</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="botões">
            <a href="/gerenciar-aquisicao-servicos" type="button" value=""
                class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <input type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">
        </div>
    </form>{{-- Final Formulario de Inserção --}}
    <script>
        $(document).ready(function() {

            //Importa o select2 com tema do Bootstrap para a classe "select2"
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#servicos, #classeServico').select2({
                theme: 'bootstrap-5',
                width: '100%',
            });

            // Função para popular o select de serviços baseado no valor do select de classe de serviço
            function populateServicos(selectElement, classeServicoValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
                    dataType: "json",
                    success: function(response) {
                        // Limpa o select antes de adicionar novas opções
                        selectElement.empty();

                        // Adiciona um option padrão
                        selectElement.append('<option value="">Selecione um serviço</option>');

                        // Itera sobre os dados retornados e adiciona as opções ao select
                        $.each(response, function(index, item) {
                            selectElement.append('<option value="' + item.id + '">' +
                                item.descricao + '</option>');
                        });

                        // Ativa o select caso ele estivesse desabilitado
                        selectElement.prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Ocorreu um erro:", error);
                        console.log(xhr.responseText); // Detalhes do erro, se necessário
                    }
                });
            }

            // Evento change para detectar a mudança no select de classe de serviço
            $('#classeServico').change(function() {
                var classeServicoValue = $(this).val();

                // Selecione o elemento do select de serviços
                var servicosSelect = $('#servicos');

                // Desabilita o select de serviços se nenhum valor for selecionado na classe de serviço
                if (!classeServicoValue) {
                    servicosSelect.empty().append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop('disabled', true);
                    return;
                }

                // Chama a função para popular os serviços
                populateServicos(servicosSelect, classeServicoValue);
            });
        });
    </script>
@endsection
