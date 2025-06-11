@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card shadow rounded-3">
            <div class="card-header bg-primary text-white">
                <strong>Conferir Material</strong>
            </div>
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4">Como deseja Incluir o Material?</h4>
                <hr>

                <!-- Radio Buttons -->
                <div class="row mb-4 text-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="form-check me-4">
                            <input class="form-check-input inputradio" type="radio" name="radioDefault" id="radioDefault1"
                                value="1" checked>
                            <label class="form-check-label" for="radioDefault1">Por Material</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input inputradio" type="radio" name="radioDefault" id="radioDefault2"
                                value="2">
                            <label class="form-check-label" for="radioDefault2">Por Documento</label>
                        </div>
                    </div>
                </div>

                <!-- Checkbox: Filtrar por Data -->

                <!-- Por Material -->
                <div class="row align-items-end mb-3" id="pormaterial">
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex align-items-center">
                            <input type="checkbox" id="afirma_por_data_material" name="afirma_por_data_material"
                                class="form-check-input me-2">
                            <label class="form-check-label" for="afirma_por_data">Filtrar por data</label>
                        </div>
                    </div>

                    <!-- Campo Data -->
                    <div id="id_deseja_por_data_cadastro_material" class="mb-4" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="data" class="form-label">Selecione a Data</label>
                                <input type="date" class="form-control" id="id_data_inicio_por_material">
                            </div>
                            <div class="col-md-6">
                                <label for="data" class="form-label">Selecione a Data</label>
                                <input type="date" class="form-control" id="id_data_fim_por_material">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="material" class="form-label">Selecione o Material</label>
                        <select class="form-select" id="id_material" name="material">
                            @foreach ($cadastro_inicial as $material)
                                <option value="{{ $material->id }}">
                                    {{ implode(
                                        ' - ',
                                        array_filter([
                                            $material->CategoriaMaterial?->nome,
                                            $material->ItemCatalogoMaterial?->nome,
                                            $material->Marca?->nome,
                                            $material->Cor?->nome,
                                            $material->Tamanho?->nome,
                                            $material->FaseEtaria?->nome,
                                            $material->TipoSexo?->nome,
                                        ]),
                                    ) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <button class="btn btn-success w-100" id="botao_por_material">Adicionar</button>
                    </div>
                </div>

                <!-- Por Documento -->
                <div id="pordocumento" style="display: none;">
                    <p>Por documento</p>
                    {{-- <div class="col-md-8">
                        <label for="material" class="form-label">Selecione o Material</label>
                        <select class="form-select" id="id_documento" name="documento">
                            @foreach ($cadastro_inicial as $material)
                                <option value="{{ $material->id }}">
                                    {{ implode(
                                        ' - ',
                                        array_filter([
                                            $material->CategoriaMaterial?->nome,
                                            $material->ItemCatalogoMaterial?->nome,
                                            $material->Marca?->nome,
                                            $material->Cor?->nome,
                                            $material->Tamanho?->nome,
                                            $material->FaseEtaria?->nome,
                                            $material->TipoSexo?->nome,
                                        ]),
                                    ) }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function verificarCampos() {
            if ($('#id_data_inicio_por_material').val() && $('#id_data_fim_por_material').val()) {
                return true;
            } else {
                return false;
            }
        }


        $(document).ready(function() {
            verificarCampos();
            // Alternância entre "Por Material" e "Por Documento"
            $('.inputradio').change(function() {
                if ($(this).val() == "1") {
                    $('#pormaterial').show();
                    $('#pordocumento').hide();
                } else {
                    $('#pormaterial').hide();
                    $('#pordocumento').show();
                    // Aplica desabilitação se checkbox estiver marcado
                }
            });
            $('#afirma_por_data_material').change(function(e) {
                e.preventDefault();
                console.log('Checkbox alterado');
                if ($(this).is(':checked')) {
                    $('#id_deseja_por_data_cadastro_material').show();
                    $('#id_material').attr('disabled', true);
                } else {
                    $('#id_deseja_por_data_cadastro_material').hide();
                    $('#id_material').attr('disabled', false);
                }
            });
            $('#id_data_fim_por_material, #id_data_inicio_por_material').on('input change', function() {
                if (verificarCampos()) {
                    var dataInicio = $('#id_data_inicio_por_material').val();
                    var dataFim = $('#id_data_fim_por_material').val();
                    console.log('Data Início:', dataInicio);
                    console.log('Data Fim:', dataFim);
                    $.ajax({
                        type: "method",
                        url: "/retorna-materiais-por-data-cadastro/" + dataInicio + '/' + dataFim,
                        data: "data",
                        dataType: "dataType",
                        success: function(response) {
                        }
                    });

                    console.log('Campos de data preenchidos corretamente');
                    $('#id_material').attr('disabled', false);
                } else {
                    console.log('Campos de data não preenchidos corretamente');
                }
            });
        });
    </script>
@endsection
