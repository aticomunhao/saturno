@extends('layouts.app')

@section('title')
    Catálogo de Empresas
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
                            <h5>Identificação do Documento</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo Nome da Empresa -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 20px">
                                        <label for="nomeEmpresa" class="form-label">Nome da Empresa</label>
                                        <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>

                                    <!-- Campo Número da Proposta -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 40px">
                                        <label for="numeroProposta" class="form-label">Número da Proposta</label>
                                        <input type="number" class="form-control" id="numeroProposta" name="numeroProposta"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>

                                    <!-- Campo Data de Expedição do Documento -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 20px">
                                        <label for="dataExpedicao" class="form-label">Data de Expedição do Documento</label>
                                        <input type="date" class="form-control" id="dataExpedicao" name="dataExpedicao"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>
                                </div>

                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <!-- Campo Data do Prazo Final -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 20px">
                                        <label for="prazoFinal" class="form-label">Data do Prazo Final do Documento</label>
                                        <input type="date" class="form-control" id="prazoFinal" name="dataPrazoFinal"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
                                    </div>

                                    <!-- Campo Valor -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 20px">
                                        <label for="valor" class="form-label">Valor</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="border: 1px solid #999999;">R$</span>
                                            <input type="text" class="form-control" id="valor" name="valorProposta"
                                                style="width: 380px; border: 1px solid #999999; padding: 5px;">
                                        </div>
                                    </div>

                                    <!-- Campo Arquivo da Proposta -->
                                    <div class="form-group" style="margin-top:20px; margin-right: 20px">
                                        <label for="arquivoProposta" class="form-label">Arquivo da Proposta</label>
                                        <input type="file" class="form-control" id="arquivoProposta"
                                            name="arquivoProposta"
                                            style="width: 400px; border: 1px solid #999999; padding: 5px;">
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
            $('#valor').mask('000.000.000.000.000,00', {
                reverse: true
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
    <script>
        $(document).ready(function() {

            //Importa o select2 com tema do Bootstrap para a classe "select2"
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

        });
    </script>
@endsection
