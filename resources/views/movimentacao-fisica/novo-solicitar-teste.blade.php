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
                <div class="row justify-content-around">
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input inputradio" type="radio" name="radioDefault" id="radioDefault1"
                                value="1">
                            <label class="form-check-label" for="radioDefault1">
                                Por Material
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input inputradio" type="radio" name="radioDefault" id="radioDefault2"
                                value="2">
                            <label class="form-check-label" for="radioDefault2">
                                Por Documento
                            </label>
                        </div>
                    </div>
                </div>
                <div id="id_filtra_por_data" class="row justify-content-around" >
                    <input type="checkbox"  id="afirma_por_data" name="afirma_por_data"
                        class="form-check-input inputradio" >

                </div>
                <div id="id_deseja_por_data">
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <label for="data" class="form-label">Selecione a Data</label>
                            <input type="date" class="form-control" id="data" name="data">
                        </div>
                    </div>
                </div>

                <div class="row" id="pormaterial" class="justify-content-around" hidden>
                    <div class="col-md-6">
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
                            <!-- Opções de materiais serão carregadas aqui -->
                        </select>
                    </div>
                    <div class="col-md-3" style="margin-top: 30px">
                        <button class="btn btn-success" id="botao_por_material"> Adicionar</button>
                    </div>
                </div>


                <div id="pordocumento">

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.inputradio').change(function(e) {
                let selectedValue = $(this).val();
            });

            $('#botao_por_material').click(function(e) {
                var = $('#material').val();


                // $.ajax({

                //     url: "//",
                //     data: "data",
                //     dataType: "JSON",
                //     success: function(response) {

                //     }
                // });
            });
        });
    </script>
@endsection
