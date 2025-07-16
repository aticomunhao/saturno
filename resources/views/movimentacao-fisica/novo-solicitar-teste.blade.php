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

                <!-- Por Material -->
                <div class="row align-items-end mb-3" id="pormaterial">
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex align-items-center">
                            <input type="checkbox" id="afirma_por_data_material" name="afirma_por_data_material"
                                class="form-check-input me-2">
                            <label class="form-check-label" for="afirma_por_data_material">Filtrar por data</label>
                        </div>
                    </div>

                    <!-- Campo Data -->
                    <div id="id_deseja_por_data_cadastro_material" class="mb-4" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="data" class="form-label">Data Início</label>
                                <input type="date" class="form-control" id="id_data_inicio_por_material">
                            </div>
                            <div class="col-md-6">
                                <label for="data" class="form-label">Data Fim</label>
                                <input type="date" class="form-control" id="id_data_fim_por_material">
                            </div>
                        </div>
                    </div>

                    <!-- Select Material -->
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
                    <div class="row">
                        <div class="col-md-8">
                            <p>Por Documento</p>
                            {{-- <label for="documento" class="form-label">Selecione o Documento</label>
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
                            </select> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function verificarCampos() {
            return $('#id_data_inicio_por_material').val() && $('#id_data_fim_por_material').val();
        }

        function materiais() {
            $.ajax({
                type: "GET",
                url: "/retorna-materiais",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    // Aqui você pode processar os materiais conforme necessário
                },
                error: function() {
                    console.error('Erro ao carregar materiais.');
                }
            });
        }

        $(document).ready(function() {
            // Alternância entre os tipos de inclusão
            $('.inputradio').change(function() {
                if ($(this).val() == "1") {
                    $('#pormaterial').show();
                    $('#pordocumento').hide();
                } else {
                    $('#pormaterial').hide();
                    $('#pordocumento').show();
                }
            });

            // Checkbox: Filtrar por data
            $('#afirma_por_data_material').change(function() {
                if ($(this).is(':checked')) {
                    $('#id_deseja_por_data_cadastro_material').show();
                    $('#id_material').attr('disabled', true);
                } else {
                    $('#id_deseja_por_data_cadastro_material').hide();
                    $('#id_material').attr('disabled', false);
                }
            });

            // Alterações nos campos de data
            $('#id_data_fim_por_material, #id_data_inicio_por_material').on('change', function() {
                if (verificarCampos()) {
                    const dataInicio = $('#id_data_inicio_por_material').val();
                    const dataFim = $('#id_data_fim_por_material').val();

                    $.ajax({
                        type: "GET",
                        url: `/retorna-materiais-por-data-cadastro/${dataInicio}/${dataFim}`,
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            $('#id_material').empty();
                            $.each(response, function(indexInArray, material) {
                                //    $material->CategoriaMaterial?->nome,
                                //         $material->ItemCatalogoMaterial?->nome,
                                //         $material->Marca?->nome,
                                //         $material->Cor?->nome,
                                //         $material->Tamanho?->nome,
                                //         $material->FaseEtaria?->nome,
                                //         $material->TipoSexo?->nome,
                                var nome = '';
                                if (material.categoria_material) {
                                    nome += material.categoria_material.nome + ' - ';
                                    console.log(nome);

                                }
                                if (material.item_catalogo_material) {
                                    nome += material.item_catalogo_material.nome +
                                        ' - ';
                                }
                                if (material.marca) {
                                    nome += material.marca.nome +
                                        ' - ';
                                }
                                if (material.cor) {
                                    nome += material.cor.nome +
                                        ' - ';
                                }
                                if (material.tamanho) {
                                    nome += material.tamanho.nome +
                                        ' - ';
                                }

                            });

                            $('#id_material').attr('disabled', false);
                        },
                        error: function(xhr, status, error) {
                            console.error('Erro ao buscar materiais por data:', error);
                        }
                    });
                } else {
                    console.log('Campos de data não preenchidos corretamente.');
                }
            });

            // Botão "Adicionar"
            $('#botao_por_material').click(function() {
                const materialId = $('#id_material').val();
                alert(`Material ID ${materialId} selecionado para adicionar.`);
                // Aqui você pode acionar a lógica desejada
            });
        });
    </script>
@endsection
