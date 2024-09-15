@extends('layouts.app')

@section('title')
    Incluir Aquisição de Material
@endsection
@section('content')
    <form method="POST" action="/salvar-aquisicao-material/" enctype="multipart/form-data">{{-- Formulario de Inserção --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                            @if ($errors->any())
                                <br>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Incluir Solicitação de Material
                                </h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação da Solicitação</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Categoria do Material
                                        <br>
                                        <select class="js-example-responsive form-select select2"
                                            style="border: 1px solid #999999; padding: 5px;" id="categoriaMaterial"
                                            name="categoriaMaterial" required>
                                            <option></option>
                                            @foreach ($tipoCategoriaMaterial as $tipoCategoriaMateriais)
                                                <option value="{{ $tipoCategoriaMateriais->id }}">
                                                    {{ $tipoCategoriaMateriais->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Material
                                        <br>
                                        <select class="js-example-responsive form-select select2"
                                            style="border: 1px solid #999999; padding: 5px;" id="materiais"
                                            name="tipoMateriais" value="{{ old('tipoMateriais') }}" disabled required>
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
                                <div class=" col-12">Observação
                                    <br>
                                    <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                        name="observacao"></textarea>
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
            <a href="/gerenciar-aquisicao-material" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <input type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">
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
                        <input type="text" class="form-control" name="numero[]" placeholder="Digite o Número da proposta"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="razaoSocial">Nome Empresa</label>
                        <select class="form-select" style="border: 1px solid #999999; padding: 5px;" id="idSetor"
                            name="razaoSocial[]" required>
                            <option></option>
                            @foreach ($empresa as $empresas)
                                <option value="{{ $empresas->id }}">
                                    {{ $empresas->razaosocial }} - {{ $empresas->nomefantasia }}
                                </option>
                            @endforeach
                        </select>
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
                            placeholder="Digite a data final do prazo da proposta" min="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="arquivo">Arquivo da Proposta</label>
                        <input type="file" class="form-control" name="arquivo[]"
                            placeholder="Insira o arquivo da proposta" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function populateServicos(selectElement, classeMaterialValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-tipo-material/" + classeMaterialValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        selectElement.append(
                            '<option value="">Selecione um serviço</option>'
                        );
                        $.each(response, function(index, item) {
                            selectElement.append(
                                '<option value="' +
                                item.id +
                                '">' +
                                item.nome +
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

            $("#categoriaMaterial").change(function() {
                var categoriaMaterialValue = $(this).val();
                var materiaisSelect = $("#materiais");

                if (!categoriaMaterialValue) {
                    materiaisSelect
                        .empty()
                        .append('<option value="">Selecione um serviço</option>');
                        materiaisSelect.prop("disabled", true);
                    return;
                }

                populateServicos(materiaisSelect, categoriaMaterialValue);
            });

            $("#add-proposta").click(function() {
                var newProposta = $("#template-proposta-comercial").html();
                $("#form-propostas-comerciais").append(newProposta);
            });

            $(document).on("click", ".remove-proposta", function() {
                $(this).closest(".proposta-comercial").remove();
            });
        });
    </script>
@endsection
