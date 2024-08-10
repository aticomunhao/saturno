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
                        <br>
                        <div class="card-body">
                            <h5>Identificação do Serviço</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="classeServico"
                                            name="classe">
                                            <option value=""></option>
                                            @foreach ($classeAquisicao as $classeAquisicaos)
                                                <option @if (old('classe') == $classeAquisicaos->idClasse) {{ 'selected="selected"' }} @endif
                                                    value="{{ $classeAquisicaos->idClasse }}">
                                                    {{ $classeAquisicaos->descricaoClasse }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Serviço
                                        <br>
                                        <select class="js-example-responsive form-select"
                                            style="border: 1px solid #999999; padding: 5px;" id="servicos" name="servicos"
                                            value="{{ old('servicos') }}" disabled>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">Motivo
                                        <br>
                                        <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                            name="motivo" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h5>Propostas Comerciais</h5>
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-3">1º Empresa
                                        <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                            type="text" value="" id="3" name="nomeEmpresa"
                                            required="required">
                                    </div>
                                    <div class="col-md-3">Valor Orçado
                                        <div class="input-group">
                                            <span class="input-group-text"
                                                style="border: 1px solid #999999; padding: 5px;">R$</span>
                                            <input type="text" class="form-control"
                                                style="border: 1px solid #999999; padding: 5px;"
                                                aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                    <div>Arquivo da Proposta
                                        
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
            $('#servicos, #classeServico').select2({
                theme: 'bootstrap-5',
                width: '100%',
            });

            function populateCities(selectElement, stateValue) {
                $.ajax({
                    type: "get",
                    url: "/retorna-nome-servicos/" + stateValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        $.each(response, function(indexInArray, item) {
                            selectElement.append('<option value="' + item.id_cidade + '">' +
                                item.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error);
                    }
                });
            }

            $('#classeServico').change(function(e) {
                var stateValue = $(this).val();
                $('#servicos').removeAttr('disabled');
                populateCities($('#servicos'), stateValue);
            });
        });
    </script>
@endsection
