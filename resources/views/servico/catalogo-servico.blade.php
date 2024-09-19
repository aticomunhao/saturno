@extends('layouts.app')

@section('title')
    Catálogo de Serviços
@endsection
@section('content')
    <div class="container-fluid"> {{-- Container completo da página  --}}
        <div class="justify-content-center">
            <div class="col-12">
                <br>
                <div class="card" style="border-color: #355089;">
                    <div class="card-header">
                        <div class="ROW">
                            <h5 class="col-12" style="color: #355089">
                                Catálogo de Serviços
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('catalogo-servico.index') }}">{{-- Formulario de Inserção --}}
                            @csrf
                            <div class="row">
                                <div class="col-md-2 col-sm-12">Classe do Serviço
                                    <br>
                                    <select class="js-example-responsive form-select select2"
                                        style="border: 1px solid #999999; padding: 5px;" id="classeServico" name="classe">
                                        <option value=""></option>
                                        @foreach ($classesAquisicao as $classeAquisicaos)
                                            <option value="" <option value="{{ $classeAquisicaos->id }}"
                                                {{ old('classe') }}>
                                                {{ $classeAquisicaos->descricao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-12">Tipo de Serviço
                                    <br>
                                    <select class="js-example-responsive form-select select2"
                                        style="border: 1px solid #999999;" id="servicos" name="servicos"
                                        value="{{ old('servicos') }}" disabled>
                                    </select>
                                </div>
                                <div class="col" style="margin-top: 20px">
                                    <a href="{{ route('catalogo-servico.index') }}" class="btn btn-light btn-sm"
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;" type="button"
                                        value="">
                                        Limpar
                                    </a>
                                    <input class="btn btn-light btn-sm"
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;" type="submit"
                                        value="Pesquisar">
                                </div>
                            </div>
                        </form>

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($classesAquisicao as $classeAquisicaos)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $classeAquisicaos->id }}"
                                            aria-expanded="false" aria-controls="flush-collapse{{ $classeAquisicaos->id }}">
                                            {{ $classeAquisicaos->descricao }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $classeAquisicaos->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul>
                                                @foreach ($classeAquisicaos->catalogoServico as $tipoServico)
                                                    <li>{{ $tipoServico->descricao }}</li>
                                                @endforeach
                                            </ul>
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
    </div>
    </div>
    <script>
        $(document).ready(function() {
            function populateServicos(selectElement, classeServicoValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
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
                                item.descricao +
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

            $("#classeServico").change(function() {
                var classeServicoValue = $(this).val();
                var servicosSelect = $("#servicos");

                if (!classeServicoValue) {
                    servicosSelect
                        .empty()
                        .append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop("disabled", false);
                    return;
                }

                populateServicos(servicosSelect, classeServicoValue);
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
