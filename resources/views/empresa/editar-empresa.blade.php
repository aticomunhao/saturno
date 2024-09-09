@extends('layouts.app')

@section('title')
    Editar de Empresa
@endsection
@section('content')
    <form method="POST" action="/atualizar-empresa">{{-- Formulario de Inserção --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Catálogo de Empresas
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação da Empresa</h5>
                            <div class="row">
                                <!-- Campo Nome da Empresa(Razão social) -->
                                <div class="col-md-3 col-sm-12">Razão Social
                                    <input type="text" class="form-control" id="razaoSocialId" name="razaoSocial"
                                        style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->razaosocial }}" required>
                                </div>
                                <!-- Campo Nome Fantasia -->
                                <div class="col-md-3 col-sm-12">Nome Fantasia
                                    <input type="text" class="form-control" id="nomeFantasiaId" name="nomeFantasia"
                                        style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->nomefantasia }}" required>
                                </div>
                                <!-- Campo CNPJ/CPF -->
                                <div class="col-md-3 col-sm-12">CNPJ - CPF
                                    <input type="text" class="form-control" id="cnpjId" name="cnpj"
                                        style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->cnpj_cpf }}" required>
                                </div>
                                <!-- Campo País -->
                                <div class="col-md-3 col-sm-12">País
                                    <input type="text" class="form-control" id="paisId" name="pais"
                                        style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->pais_cod }}">
                                </div>
                            </div>
                            <div class="row">
                                <!-- Campo Inscrição Estadual -->
                                <div class="col-md-3 col-sm-12">Inscrição Estadual
                                    <input type="text" class="form-control" id="inscraicaoEstadualId"
                                        name="inscricaoEstadual" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->inscestadual }}" required>
                                </div>
                                <!-- Campo Inscrição Municipal -->
                                <div class="col-md-3 col-sm-12">Inscrição Municipal
                                    <input type="text" class="form-control" id="inscraicaoMunicipalId"
                                        name="inscricaoMunicipal" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->inscmunicipal }}">
                                </div>
                                <!-- Campo Telefone -->
                                <div class="col-md-3 col-sm-12">Telefone
                                    <input type="text" class="form-control" id="inscraicaoTelefoneId"
                                        name="inscricaoTelefone" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->telefone }}">
                                </div>
                                <!-- Campo Email -->
                                <div class="col-md-3 col-sm-12">Email
                                    <input type="text" class="form-control" id="inscraicaoEmailId" name="inscricaoEmail"
                                        style="border: 1px solid #999999; padding: 5px;" value="{{ $buscaEmpresa->email }}">
                                </div>
                            </div>
                            <hr>
                            <h5>Endereço da Empresa</h5>
                            <div class="row">
                                <!-- Campo CEP -->
                                <div class="col-md-3 col-sm-12">CEP
                                    <input type="text" class="form-control" id="inscraicaoCepId" name="inscricaoCep"
                                        style="border: 1px solid #999999; padding: 5px;" value="{{ $buscaEmpresa->cep }}"
                                        required>
                                </div>
                                <!-- Campo UF -->
                                <div class="col-md-1 col-sm-12">UF
                                    <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                        id="tp_uf" name="tp_uf">
                                        <option value=""></option>
                                        @foreach ($tiposUf as $tipoUf)
                                            <option value="{{ $tipoUf->id }}"
                                                @if (old('tp_uf', $buscaEmpresa->tipoUf->id) == $tipoUf->id) selected @endif>
                                                {{ $tipoUf->sigla }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Campo Cidade -->
                                <div class="col-md-4 col-sm-12">Cidade
                                    <br>
                                    <select class="js-example-responsive form-select select2"
                                        style="border: 1px solid #999999; padding: 5px;" id="cidade" name="cidade"
                                        value="{{ old('cidade') }}" disabled>
                                    </select>
                                </div>
                                <!-- Campo Logradouro -->
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Logradouro</label>
                                    <input type="text" class="form-control" id="inscraicaoLogradouroId"
                                        name="inscricaoLogradouro" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->logradouro }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Campo Número -->
                                <div class="col-md-2 col-sm-12">Número
                                    <input type="text" class="form-control" id="inscraicaoNumeroId"
                                        name="inscricaoNumero" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->numero }}" required>
                                </div>
                                <!-- Campo Complemento -->
                                <div class="col-md-4 col-sm-12">Complemento
                                    <input type="text" class="form-control" id="inscraicaoComplementoId"
                                        name="inscricaoComplemento" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->complemento }}" required>
                                </div>
                                <!-- Campo Bairro -->
                                <div class="col-md-3 col-sm-12">Bairro
                                    <input type="text" class="form-control" id="inscraicaoBairroId"
                                        name="inscricaoBairro" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->bairro }}" required>
                                </div>
                                <!-- Campo Código do Município -->
                                <div class="col-md-3 col-sm-12">Código do Município
                                    <input type="text" class="form-control" id="inscraicaoCodMunId"
                                        name="inscricaoCodMun" style="border: 1px solid #999999; padding: 5px;"
                                        value="{{ $buscaEmpresa->uf_cod }}" required>
                                </div>
                            </div>
                            <div style="display: flex; gap: 20px; align-items: flex-end;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="botões">
            <a href="/catalogo-empresa" type="button" value=""
                class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <input type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">
        </div>
    </form>{{-- Final Formulario de Inserção --}}

    <script>
        $(document).ready(function() {
            function populateCities(selectElement, stateValue) {
                $.ajax({
                    type: "get",
                    url: "/retorna-cidade-dados-residenciais/" + stateValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        $.each(response, function(indexInArray, item) {
                            selectElement.append(
                                '<option value="' +
                                item.id_cidade +
                                '">' +
                                item.descricao +
                                "</option>"
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error);
                    },
                });
            }

            $("#tp_uf").change(function(e) {
                var stateValue = $(this).val();
                $("#cidade").removeAttr("disabled");
                populateCities($("#cidade"), stateValue);
            });
        });
    </script>
@endsection
