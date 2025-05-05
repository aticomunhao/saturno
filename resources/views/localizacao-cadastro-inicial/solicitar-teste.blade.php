@extends('layouts.app')
@section('content')
    <br>
    <div class="container">

        <div class="card">
            <div class="card-header">
                Solicitar Teste de Material
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <label for="id_setor_teste">Setor Para Teste</label>
                        <select class="form-select" aria-label="Default select example" id="id_setor_teste" name="setor_teste">
                            @foreach ($setores_para_teste as $setor)
                                <option value="{{ $setor->id }}">{{ $setor->sigla }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="div_cadastro_inicial">
                    <br>
                    <div class="row" id="div_cadastro_inicial">
                        <div class="col">
                            <label for="id_cadastro_inicial">Lista de Materiais em Cadastro Inicial</label>
                            <select class="form-control select2" name="cadastro_inicial[]" id="id_cadastro_inicical"
                                multiple>
                                @foreach ($cadastro_inicial as $cadastro)
                                    <option value="{{ $cadastro->id }}">{{ $cadastro->id_nome_mat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {});
    </script>
@endsection
