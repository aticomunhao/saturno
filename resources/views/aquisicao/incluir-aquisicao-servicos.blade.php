@extends('layouts.app')

@section('title')
    Incluir Aquisição de Serviços
@endsection
@section('content')
<head><meta name="csrf-token" content="{{ csrf_token() }}"></head>
    <div class="container-fluid"> {{-- Container completo da página  --}}
        <div class="justify-content-center">
            <div class="col-12">
                <br>
                <div class="card" style="border-color: #355089;">
                    <div class="card-header">
                        <div class="ROW">
                            <h5 class="col-12" style="color: #355089">
                                Incluir Solicitação de Serviços
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/salvar-aquisicao-servicos/">{{-- Formulario de Inserção --}}
                            @csrf
                            <h5>Identificação do Serviço</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="classeServico"
                                            name="classeSv" required>
                                            <option></option>
                                            @foreach ($classeAquisicao as $classeAquisicaos)
                                                <option value="{{ $classeAquisicaos->id }}">
                                                    {{ $classeAquisicaos->descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="servicos"
                                            name="tipoServicos" value="{{ old('servicos') }}" disabled required>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-12">Selecione seu Setor
                                        <br>
                                        <select class="form-select" style="border: 1px solid #999999; padding: 5px;"
                                            id="idSetor" name="idSetor" required>
                                            <option></option>
                                            @foreach ($buscaSetor as $buscaSetors)
                                                <option value="{{ $buscaSetors->id }}">
                                                    {{ $buscaSetors->sigla }} - {{ $buscaSetors->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-12">Motivo
                                    <br>
                                    <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                        name="motivo"></textarea>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <h5>Propostas Comerciais</h5>
                                    <button type="button" class="btn btn-outline-success" onclick="saveAndOpenModal()"
                                        data-bs-placement="top" title="Incluir Propostas">
                                        <i class="bi bi-clipboard-plus" style="font-size: 1rem; color:#303030;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                        <!-- Modal Incluir Documentos -->
                        <div class="modal fade" id="IncluirDocumentoModal" tabindex="-1"
                            aria-labelledby="IncluirDocumentoModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="form-horizontal" method="POST"
                                    action="{{ url('/adicionar-documento-servico') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#3891e4">
                                            <h5 class="modal-title" id="IncluirDocumentoLabel"
                                                style="color:rgb(255, 255, 255)">Incluir Documento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: center;">

                                            <div class="mb-3">
                                                <label for="documentoNumero" class="form-label">Número da
                                                    Proposta</label>
                                                <input type="text" class="form-control" id="documentoNumero"
                                                    name="documentoNumero" required>
                                            </div>
                                            <div class="row" style="align-items: flex-end;">
                                                <div class="col-6">
                                                    <label for="documentoDataInicial" class="form-label">Data
                                                        Inicial da Proposta</label>
                                                    <input type="date" class="form-control" id="documentoDataInicial"
                                                        name="documentoDataInicial" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="documentoDataFinal" class="form-label">Data final do
                                                        Prazo da Proposta</label>
                                                    <input type="date" class="form-control" id="documentoDataFinal"
                                                        name="documentoDataFinal" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="documentoNome" class="form-label">Nome do
                                                    Documento</label>
                                                <input type="text" class="form-control" id="documentoNome"
                                                    name="documentoNome" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="documentoValor" class="form-label">Valor da
                                                    Proposta</label>
                                                <input type="text" class="form-control" id="documentoValor"
                                                    name="documentoValor" required>
                                            </div>
                                            <div class="mb-3"><label for="documentoArquivo"
                                                    class="form-label">Selecionar Arquivo:</label>
                                                <input type="file" class="form-control" id="documentoArquivo"
                                                    name="documentoArquivo" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ROW" style="margin-left:5px">
                        @foreach ($empresas as $index => $empresa)
                            <div style="display: flex; gap: 20px; align-items: flex-end;">
                                <div class="col-md-3">{{ 0 + 1 }}º Empresa (ID: {{ $empresa->id_empresa }})
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
    {{-- Final Formulario de Inserção --}}
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


        function saveAndOpenModal() {
            var form = document.querySelector('form');
            var formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: "/salvar-aquisicao-servicos/",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.solicitacaoId) {
                        $('#IncluirDocumentoModal').modal('show');
                        console.log('ID da nova solicitação:', response.solicitacaoId);
                    } else {
                        console.error('Erro ao salvar a solicitação.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao salvar a solicitação:', error);
                    console.log(xhr.responseText);
                }
            });
        }

        // Corrigindo o evento do botão para enviar via AJAX
        $('form').on('submit', function(event) {
            event.preventDefault(); // Previne o envio padrão do formulário
            saveAndOpenModal();
        });
    </script>
@endsection
