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
                <div class="row mb-3">
                    <div class="col-md-12 d-flex align-items-center">
                        <input type="checkbox" id="afirma_por_data" name="afirma_por_data" class="form-check-input me-2">
                        <label class="form-check-label" for="afirma_por_data">Filtrar por data</label>
                    </div>
                </div>

                <!-- Campo Data -->
                <div id="id_deseja_por_data" class="mb-4" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="data" class="form-label">Selecione a Data</label>
                            <input type="date" class="form-control" id="id_data_inicio" name="data_inicio">
                        </div>
                        <div class="col-md-6">
                            <label for="data" class="form-label">Selecione a Data</label>
                            <input type="date" class="form-control" id="id_data_fim" name="data_fim">
                        </div>
                    </div>
                </div>

                <!-- Por Material -->
                <div class="row align-items-end mb-3" id="pormaterial">
                    <div class="col-md-8">
                        <label for="material" class="form-label">Selecione o Material</label>
                        <select class="form-select" id="material" name="material">
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
                    <div class="col-md-8">
                        <label for="material" class="form-label">Selecione o Material</label>
                        <select class="form-select" id="material" name="material">
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
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.inputradio').change(function() {
                if ($(this).val() == "1") {
                    $('#pormaterial').show();
                    $('#pordocumento').hide();
                } else {
                    $('#pormaterial').hide();
                    $('#pordocumento').show();
                }
            });

            $('#afirma_por_data').change(function() {
                $('#id_deseja_por_data').slideToggle(this.checked);
            });

            $('#data').change(function(e) {
                var data = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "/retorna-materiais-por-data-cadastro/" + encodeURIComponent(data),
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // Aqui vai o que você deseja fazer com o resultado
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar materiais:", error);
                    }
                }); // ← Essa chave fecha o objeto $.ajax
            });
        });
    </script>
@endsection
