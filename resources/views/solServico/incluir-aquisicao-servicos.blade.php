@extends('layouts.app')

@section('title')
    Incluir Aquisição de Serviços
@endsection
@section('content')
    <form method="POST" action="/salvar-aquisicao-servicos" enctype="multipart/form-data">{{-- Formulario de Inserção --}}
        @csrf
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
                            <h5>Identificação do Serviço</h5>
                            <hr>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select select2"
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
                                        <select class="js-example-responsive form-select select2"
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
                                        name="motivo" required></textarea>
                                </div>
                            </div>
                            <div>
                                <div class="card proposta-comercial" style="border-color: #355089; margin-top: 20px;">
                                    <div class="card-header">
                                        <div style="display: flex; gap: 20px; align-items: flex-end;">
                                            <h5 style="color: #355089">Proposta Comercial</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class=" form-group row" style="margin-left:5px">
                                            <div class="col-md-4 mb-3">
                                                <label for="numero">Número da Proposta</label>
                                                <input type="text" class="form-control" name="numero[]"
                                                    placeholder="Digite o Número da proposta" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="razaoSocial">Nome Empresa</label>
                                                <select class="form-select" style="border: 1px solid #999999; padding: 5px;"
                                                    name="razaoSocial[]" required>
                                                    <option></option>
                                                    @foreach ($buscaEmpresa as $buscaEmpresas)
                                                        <option value="{{ $buscaEmpresas->id }}">
                                                            {{ $buscaEmpresas->razaosocial }} -
                                                            {{ $buscaEmpresas->nomefantasia }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="valor">Valor</label>
                                                <input type="number" class="form-control" name="valor[]"
                                                    placeholder="Digite o valor da proposta" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="dt_inicial">Data da Proposta</label>
                                                <input type="date" class="form-control" name="dt_inicial[]"
                                                    placeholder="Digite a data da proposta" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="dt_final">Data Limite</label>
                                                <input type="date" class="form-control" name="dt_final[]"
                                                    placeholder="Digite a data final do prazo da proposta" min="">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="arquivo">Arquivo da Proposta</label>
                                                <input type="file" class="form-control" name="arquivo[]"
                                                    placeholder="Insira o arquivo da proposta" required>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check col-md-4">
                                                    <label for="garantiaBotao">Possui garantia?</label>
                                                    <input type="checkbox" style="border: 1px solid #999999; padding: 5px;"
                                                        class="form-check-input" id="garantiaBotao" name="garantiaBotao[]"
                                                        @if (old('garantiaBotao')) checked @endif>
                                                </div>
                                                <div class="form-check col-md-4 mb-2">
                                                    <label for="materialBotao">Possui material?</label>
                                                    <input type="checkbox" style="border: 1px solid #999999; padding: 5px;"
                                                        class="form-check-input" id="materialBotao" name="materialBotao[]"
                                                        @if (old('materialBotao')) checked @endif>
                                                </div>
                                            </div>
                                            <div id="tempoGarantia" class="col-md-4 mb-3" style="display: none;">
                                                <label for="tempoGarantiaInput">Tempo de Garantia (em dias)</label>
                                                <input type="number" class="form-control" id="tempoGarantiaInput"
                                                    name="tempoGarantia[]" placeholder="Digite o tempo de garantia">
                                            </div>
                                            <div id="nomeMaterial" class="col-md-4 mb-3" style="display: none;">
                                                <label for="nomeMaterialInput">Nome do Material</label>
                                                <input type="text" class="form-control" id="nomeMaterialInput"
                                                    name="nomeMaterial[]" placeholder="Digite o nome do material">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container para os formulários de propostas comerciais -->
                            <div id="form-propostas-comerciais">
                                <!-- Formulários de propostas comerciais serão adicionados aqui -->
                            </div>
                            <!-- Botão para adicionar nova proposta comercial -->
                            <div class="col-12 text-center mt-4">
                                <button type="button" id="add-proposta" class="btn btn-success">Adicionar Proposta
                                    Comercial</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="botões">
            <a href="javascript:history.back()" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
        </div>
    </form>

    <!-- Template de formulário de proposta comercial -->
    <div id="template-proposta-comercial" style="display: none;">
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
                        <input type="text" class="form-control" name="numero[]"
                            placeholder="Digite o Número da proposta">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="razaoSocial">Nome Empresa</label>
                        <select class="form-select" style="border: 1px solid #999999; padding: 5px;"
                            name="razaoSocial[]">
                            <option></option>
                            @foreach ($buscaEmpresa as $buscaEmpresas)
                                <option value="{{ $buscaEmpresas->id }}">
                                    {{ $buscaEmpresas->razaosocial }} - {{ $buscaEmpresas->nomefantasia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="valor[]"
                            placeholder="Digite o valor da proposta">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dt_inicial">Data da Proposta</label>
                        <input type="date" class="form-control" name="dt_inicial[]"
                            placeholder="Digite a data da proposta">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dt_final">Data Limite</label>
                        <input type="date" class="form-control" name="dt_final[]"
                            placeholder="Digite a data final do prazo da proposta" min="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="arquivo">Arquivo da Proposta</label>
                        <input type="file" class="form-control" name="arquivo[]"
                            placeholder="Insira o arquivo da proposta">
                    </div>
                    <div class="col-md-4">
                        <div class="form-check col-md-4">
                            <label for="garantiaBotao">Possui garantia?</label>
                            <input type="checkbox" style="border: 1px solid #999999; padding: 5px;"
                                class="form-check-input" id="garantiaBotao" name="garantiaBotao[]"
                                @if (old('garantiaBotao')) checked @endif>
                        </div>
                        <div class="form-check col-md-4 mb-2">
                            <label for="materialBotao">Possui material?</label>
                            <input type="checkbox" style="border: 1px solid #999999; padding: 5px;"
                                class="form-check-input" id="materialBotao" name="materialBotao[]"
                                @if (old('materialBotao')) checked @endif>
                        </div>
                    </div>
                    <div id="tempoGarantia" class="col-md-4 mb-3" style="display: none;">
                        <label for="tempoGarantiaInput">Tempo de Garantia (em dias)</label>
                        <input type="number" class="form-control" id="tempoGarantiaInput" name="tempoGarantia[]"
                            placeholder="Digite o tempo de garantia">
                    </div>
                    <div id="nomeMaterial" class="col-md-4 mb-3" style="display: none;">
                        <label for="nomeMaterialInput">Nome do Material</label>
                        <input type="text" class="form-control" id="nomeMaterialInput"
                            name="nomeMaterial[]" placeholder="Digite o nome do material">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM do Template de formulário de proposta comercial -->
    <script>
        $(document).ready(function() {
            // Função para popular serviços com base na classe de serviço
            function populateServicos(selectElement, classeServicoValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        selectElement.append('<option value="">Selecione um serviço</option>');
                        $.each(response, function(index, item) {
                            selectElement.append(
                                '<option value="' + item.id + '">' + item.descricao +
                                "</option>"
                            );
                        });
                        selectElement.prop("disabled", false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Ocorreu um erro:", error);
                        console.log(xhr.responseText);
                    },
                });
            }

            // Atualiza os serviços ao alterar a classe de serviço
            $(document).on("change", "#classeServico", function() {
                const classeServicoValue = $(this).val();
                const servicosSelect = $("#servicos");

                if (!classeServicoValue) {
                    servicosSelect.empty().append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop("disabled", true);
                    return;
                }

                populateServicos(servicosSelect, classeServicoValue);
            });

            // Adiciona nova proposta comercial
            $("#add-proposta").click(function() {
                const newProposta = $("#template-proposta-comercial").html();
                $("#form-propostas-comerciais").append(newProposta);
            });

            // Remove proposta comercial
            $(document).on("click", ".remove-proposta", function() {
                $(this).closest(".proposta-comercial").remove();
            });

            // Alterna campo de tempo de garantia para formulários dinâmicos
            $(document).on("change", ".form-check-input[name='garantiaBotao[]']", function() {
                const garantiaCheckbox = $(this);
                const tempoGarantiaDiv = garantiaCheckbox
                    .closest(".form-group.row")
                    .find("#tempoGarantia");

                if (garantiaCheckbox.is(":checked")) {
                    tempoGarantiaDiv.show();
                } else {
                    tempoGarantiaDiv.hide();
                }
            });

             // Inicializa a visibilidade do campo de garantia com base no estado inicial
             $(".form-check-input[name='garantiaBotao[]']").each(function() {
                const garantiaCheckbox = $(this);
                const tempoGarantiaDiv = garantiaCheckbox
                    .closest(".form-group.row")
                    .find("#tempoGarantia");

                if (garantiaCheckbox.is(":checked")) {
                    tempoGarantiaDiv.show();
                } else {
                    tempoGarantiaDiv.hide();
                }
            });

            // Alterna campo de material para formulários dinâmicos
            $(document).on("change", ".form-check-input[name='materialBotao[]']", function() {
                const materialCheckbox = $(this);
                const nomeMaterialDiv = materialCheckbox
                    .closest(".form-group.row")
                    .find("#nomeMaterial");

                if (materialCheckbox.is(":checked")) {
                    nomeMaterialDiv.show();
                } else {
                    nomeMaterialDiv.hide();
                }
            });

            // Inicializa a visibilidade do campo de material com base no estado inicial
            $(".form-check-input[name='materialBotao[]']").each(function() {
                const materialCheckbox = $(this);
                const nomeMaterialDiv = materialCheckbox
                    .closest(".form-group.row")
                    .find("#nomeMaterial");

                if (materialCheckbox.is(":checked")) {
                    nomeMaterialDiv.show();
                } else {
                    nomeMaterialDiv.hide();
                }
            });
        });
    </script>
@endsection
