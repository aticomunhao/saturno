@extends('layouts.app')

@section('title')
    Incluir Aquisição de Serviços
@endsection
@section('content')
    <form method="PUT" action="/atualizar-aquisicao-servicos/{{ $solicitacao->id }}" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Editar Solicitação de Serviços
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação do Serviço</h5>
                            <hr>
                            <br>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">
                                        <label>Número da Solicitação</label>
                                        <input class="form-control" type="text" value="{{ $solicitacao->id }}"
                                            id="iddt_inicio" name="dt_inicio" required="required" disabled>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label>Data de Criação da Solicitação</label>
                                        <input class="form-control" type="text" value="{{ \Carbon\Carbon::parse($solicitacao->data)->format('d/m/Y') }}"
                                            id="iddt_inicio" name="dt_inicio" required="required" disabled>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="classeServico"
                                            name="classeSv" required>
                                            <option></option>
                                            @foreach ($classeAquisicao as $classeAquisicaos)
                                                <option value="{{ $classeAquisicaos->id }}"
                                                    {{ $solicitacao->id_classe_sv == $classeAquisicaos->id ? 'selected' : '' }}>
                                                    {{ $classeAquisicaos->descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="servicos"
                                            name="tipoServicos" required>
                                            <option value="">Selecione um serviço</option>
                                            @foreach ($tiposServico as $tipoServico)
                                                <option value="{{ $tipoServico->id }}"
                                                    {{ $solicitacao->id_tp_sv == $tipoServico->id ? 'selected' : '' }}>
                                                    {{ $tipoServico->descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-12">Setor
                                        <br>
                                        <select class="form-select" style="border: 1px solid #999999; padding: 5px;"
                                            id="idSetor" name="idSetor" disabled>
                                            <option></option>
                                            @foreach ($buscaSetor as $buscaSetors)
                                                <option value="{{ $buscaSetors->id }}"
                                                    {{ $solicitacao->id_setor == $buscaSetors->id ? 'selected' : '' }}>
                                                    {{ $buscaSetors->sigla }} - {{ $buscaSetors->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">Motivo
                                    <br>
                                    <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                        name="motivo">{{ old('motivo', $solicitacao->motivo) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="button" id="add-proposta" class="btn btn-success">Adicionar Proposta
                                    Comercial</button>
                            </div>

                            <div id="form-propostas-comerciais">
                                @foreach ($documentos as $documento)
                                    <input type="hidden" name="documento_id[]" value="{{ $documento->id }}">
                                    <div class="card proposta-comercial" style="border-color: #355089; margin-top: 20px;">
                                        <div class="card-header">
                                            <div style="display: flex; gap: 20px; align-items: flex-end;">
                                                <h5 style="color: #355089">Proposta Comercial</h5>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm float-end remove-proposta">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class=" form-group row" style="margin-left:5px">
                                                <div class="col-md-4 mb-3">
                                                    <label for="numero">Número da Proposta</label>
                                                    <input type="text" class="form-control" name="numeroOld[]"
                                                        placeholder="Digite o Número da proposta" required
                                                        value="{{ $documento->numero }}">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="razaoSocial">Razão Social</label>
                                                    <input type="text" class="form-control" name="razaoSocialOld[]"
                                                        placeholder="Digite a razão social da empresa proposta"
                                                        value="{{ $documento->id_empresa }}" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="valor">Valor</label>
                                                    <input type="text" class="form-control" name="valorOld[]"
                                                        placeholder="Digite o valor da proposta" required
                                                        value="{{ $documento->valor }}">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="dt_inicial">Data da Proposta</label>
                                                    <input type="date" class="form-control" name="dt_inicialOld[]"
                                                        placeholder="Digite a data da proposta"
                                                        value="{{ $documento->dt_doc }}" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="dt_final">Data Limite</label>
                                                    <input type="date" class="form-control" name="dt_finalOld[]"
                                                        value="{{ $documento->dt_validade }}"
                                                        placeholder="Digite a data final do prazo da proposta">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="arquivo">Arquivo da Proposta</label>
                                                    <input type="file" class="form-control" name="arquivoOld[]"
                                                        value="{{ $documento->end_arquivo }}" required
                                                        placeholder="Insira o arquivo da proposta">
                                                </div>
                                                <div class="col-md-3 mb-3 row">
                                                    <label for="arquivo">Arquivo da Atual</label>
                                                    @if ($documento->arquivo_url)
                                                        <a href="{{ $documento->arquivo_url }}" target="_blank"
                                                            class="btn btn-primary">
                                                            Ver Arquivo
                                                        </a>
                                                    @else
                                                        <a class="btn btn-secondary" disabled>Nenhum arquivo
                                                            disponível.</a>
                                                    @endif
                                                </div>
                                            </div>
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
    </form>

    <script>
        $(document).ready(function() {
            // Inicializar select2
            $('#servicos, #classeServico').select2({
                theme: 'bootstrap-5',
                width: '100%',
            });

            // Adicionar nova proposta comercial
            $('#add-proposta').click(function() {
                var newProposta = $('#template-proposta-comercial').html();
                $('#form-propostas-comerciais').append(newProposta);
            });

            // Adicionar lógica de remoção de proposta
            $(document).on('click', '.remove-proposta', function() {
                $(this).closest('.proposta-comercial').remove();
            });

            // Inicializar valores do select de serviços com base no valor atual da classe de serviço
            var classeServicoValue = $('#classeServico').val();
            if (classeServicoValue) {
                populateServicos($('#servicos'), classeServicoValue, '{{ $solicitacao->id_tp_sv }}');
            }

            // Evento change para o select de classe de serviço
            $('#classeServico').change(function() {
                var classeServicoValue = $(this).val();
                var servicosSelect = $('#servicos');

                if (!classeServicoValue) {
                    servicosSelect.empty().append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop('disabled', true);
                    return;
                }

                populateServicos(servicosSelect, classeServicoValue);
            });

            // Função para popular o select de serviços
            function populateServicos(selectElement, classeServicoValue, selectedServiceId = null) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        selectElement.append('<option value="">Selecione um serviço</option>');
                        $.each(response, function(index, item) {
                            selectElement.append('<option value="' + item.id + '"' +
                                (item.id == selectedServiceId ? ' selected' : '') + '>' +
                                item.descricao + '</option>');
                        });
                        selectElement.prop('disabled', false);
                    },
                    error: function(error) {
                        console.log("Erro ao buscar serviços:", error);
                    }
                });
            }
        });
    </script>

    <!-- Template para adicionar nova proposta comercial dinamicamente -->
    <script type="text/template" id="template-proposta-comercial">
            <div class="card proposta-comercial" style="border-color: #355089; margin-top: 20px;">
                <div class="card-header">
                    <div style="display: flex; gap: 20px; align-items: flex-end;">
                        <h5 style="color: #355089">Proposta Comercial</h5>
                        <button type="button" class="btn btn-danger btn-sm float-end remove-proposta">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class=" form-group row" style="margin-left:5px">
                        <div class="col-md-4 mb-3">
                            <label for="numero">Número da Proposta</label>
                            <input type="text" class="form-control" name="numero[]" placeholder="Digite o Número da proposta"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="razaoSocial">Razão Social</label>
                            <input type="text" class="form-control" name="razaoSocial[]"
                                placeholder="Digite a razão social da empresa proposta" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" name="valor[]" placeholder="Digite o valor da proposta"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="dt_inicial">Data da Proposta</label>
                            <input type="date" class="form-control" name="dt_inicial[]"
                                placeholder="Digite a data da proposta" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="dt_final">Data Limite</label>
                            <input type="date" class="form-control" name="dt_final[]"
                                placeholder="Digite a data final do prazo da proposta">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="arquivo">Arquivo da Proposta</label>
                            <input type="file" class="form-control" name="arquivo[]"
                                placeholder="Insira o arquivo da proposta" required>
                        </div>
                    </div>
                </div>
            </div>
    </script>
@endsection
