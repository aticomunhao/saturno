@extends('layouts.app')

@section('title')
    Incluir Aquisição de Serviços
@endsection
@section('content')
    <form method="POST" action="/salvar-aquisicao-servicos">{{-- Formulario de Inserção --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Incluir Aquisição de Serviços
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação do Serviço</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="classeServico"
                                            name="classeSv">
                                            <option value=""></option>
                                            @foreach ($classeAquisicao as $classeAquisicaos)
                                                <option value="{{ $classeAquisicaos->idClasse }}">
                                                    {{ $classeAquisicaos->descricaoClasse }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="servicos"
                                            name="tipoServicos" value="{{ old('servicos') }}" disabled>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Selecione seu Setor
                                        <br>
                                        <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                            id="idSetor" name="idSetor" value="">
                                            <option value=""></option>
                                            @foreach ($buscaSetor as $buscaSetors)
                                                <option value="{{ $buscaSetors->id }}">
                                                    {{ $buscaSetors->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-12">Motivo
                                    <br>
                                    <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                        name="motivo" value=""></textarea>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h5>Propostas Comerciais</h5>
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
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
        </div>
    </form>{{-- Final Formulario de Inserção --}}
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
    <script>
        $(document).ready(function() {

            //Importa o select2 com tema do Bootstrap para a classe "select2"
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

        });
    </script>
@endsection
