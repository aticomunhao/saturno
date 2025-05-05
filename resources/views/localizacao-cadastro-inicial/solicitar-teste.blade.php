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

                <div class="row">
                    
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {});
    </script>
@endsection
