@extends('layouts.app')

@section('title')
    Incluir de Empresa
@endsection
@section('content')
    <form method="POST" action="/salvar-catalogo-empresa">{{-- Formulario de Inserção --}}
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
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo Nome da Empresa(Razão social) -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Razão Social</label>
                                        <input type="text" class="form-control" id="razaoSocialId" name="razaoSocial"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Nome Fantasia -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Nome Fantasia</label>
                                        <input type="text" class="form-control" id="nomeFantasiaId" name="nomeFantasia"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo CNPJ/CPF -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">CNPJ - CPF</label>
                                        <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa"
                                            style="width: 200px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo CNAE -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Inscrição CNAE</label>
                                        <input type="text" class="form-control" id="inscraicaoCnaeId"
                                            name="inscricaoCnae"
                                            style="width: 250px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                     <!-- Campo IE -->
                                     <div class="form-group" style="margin-top:20px;>
                                        <label class="form-label">Inscrição IE</label>
                                        <input type="text" class="form-control" id="inscraicaoIeId"
                                            name="inscricaoIe"
                                            style="width: 250px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                </div>
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo Inscrição Estadual -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Inscrição Estadual</label>
                                        <input type="text" class="form-control" id="inscraicaoEstadualId"
                                            name="inscricaoEstadual"
                                            style="width: 300px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Inscrição Municipal -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Inscrição Municipal</label>
                                        <input type="text" class="form-control" id="inscraicaoMunicipalId"
                                            name="inscricaoMunicipal"
                                            style="width: 300px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo DDD -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">DDD</label>
                                        <input type="text" class="form-control" id="inscraicaoDddId"
                                            name="inscricaoDdd"
                                            style="width: 50px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Telefone -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="inscraicaoTelefoneId"
                                            name="inscricaoTelefone"
                                            style="width: 250px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Email -->
                                    <div class="form-group" style="margin-top:20px;">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" id="inscraicaoEmailId"
                                            name="inscricaoEmail"
                                            style="width: 600px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                </div>
                                <hr>
                                <h5>Endereço da Empresa</h5>
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo CEP -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="inscraicaoCepId" name="inscricaoCep"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo UF -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">UF</label>
                                        <input type="text" class="form-control" id="inscraicaoUfId" name="inscricaoUf"
                                            style="width: 150px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Cidade -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="inscraicaoCidadeId"
                                            name="inscricaoCidade"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Logradouro -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Logradouro</label>
                                        <input type="text" class="form-control" id="inscraicaoLogradouroId"
                                            name="inscricaoLogradouro"
                                            style="width: 580px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                </div>
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo Número -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Número</label>
                                        <input type="text" class="form-control" id="inscraicaoNumeroId"
                                            name="inscricaoNumero"
                                            style="width: 200px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Complemento -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="inscraicaoComplementoId"
                                            name="inscricaoComplemento"
                                            style="width: 530px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Bairro -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="inscraicaoBairroId"
                                            name="inscricaoBairro"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                    <!-- Campo Código do Município -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 5px">
                                        <label class="form-label">Código do Município</label>
                                        <input type="text" class="form-control" id="inscraicaoCodMunId"
                                            name="inscricaoCodMun"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
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
@endsection
