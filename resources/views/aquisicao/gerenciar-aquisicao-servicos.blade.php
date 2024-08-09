@extends('layouts.app')

@section('title')
    Gerenciar Perfis
@endsection
@section('content')
    <form method="GET" action="/gerenciar-cargos">{{-- Formulario de pesquisa --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Gerenciar Cargos
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
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
                                    <div class="row justify-content-start">
                                        <div class="col-12">
                                            <a href="/gerenciar-aquisicao-servicos" type="button" class="btn btn-light btn-sm"
                                                style="box-shadow: 1px 2px 5px #000000; margin-left: 2px; font-size: 1rem"
                                                value="">Limpar</a>
                                            <button class="btn btn-light btn-sm "
                                                style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;"{{-- Botao submit do formulario de pesquisa --}}
                                                type="submit">Pesquisar
                                            </button>
                                            <a href="/incluir-aquisicao-servico" {{-- Botao com rota para incluir cargo --}}
                                                class="btn btn-success"
                                                style="font-size: 1rem; box-shadow: 1px 2px 5px #000000;">
                                                Novo+
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <table {{-- Inicio da tabela de informacoes --}}
                                class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                                <thead style="text-align: center; ">{{-- inicio header tabela --}}
                                    <tr style="background-color: #d6e3ff; font-size:19px; color:#000;" class="align-middle">
                                        <th></th>
                                        <th>Número</th>
                                        <th>Data</th>
                                        <th>Tipo Serviço</th>
                                        <th>Proposta</th>
                                        <th>Setor</th>
                                        <th>Prioridade</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>{{-- Fim do header da tabela --}}
                                <tbody style="font-size: 15px; color:#000000;">{{-- Inicio body tabela --}}
                                    @foreach ($aquisicao as $aquisicaos)
                                            @if ($aquisicaos->idClasse && $aquisicaos->idCatalogo)
                                        <tr>
                                            <td></td>
                                            <td>{{ $aquisicaos->idSolicitacao}}</td>{{-- Adiciona o nome da Pessoa  --}}
                                            <td>{{ $aquisicaos->dataSolicitacao}}</td>
                                            <td>{{ $aquisicaos->descricaoCatalogo}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $aquisicaos->statusServico}}</td>
                                            <td></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                {{-- Fim body da tabela --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>{{-- Final Formulario de pesquisa --}}
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
