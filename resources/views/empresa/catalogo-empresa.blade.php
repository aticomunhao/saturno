@extends('layouts.app')

@section('title')
    Catálogo de Empresas
@endsection
@section('content')
    <form method="GET" action="/catalogo-empresa">{{-- Formulario de Inserção --}}
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
                            <div style="display: flex; gap: 20px; align-items: flex-end;">
                                <div class="col-md-2 col-sm-12">Razão Social
                                    <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                        maxlength="50" type="text" id="3" name="razao social"
                                        value="">
                                </div>
                                <div class="col-md-2 col-sm-12">Nome Fantasia
                                    <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                        maxlength="50" type="text" id="3" name="nome fantasia"
                                        value="">
                                </div>
                                <div class="col" style="margin-top: 20px">
                                    <a href="/gerenciar-funcionario" class="btn btn-light btn-sm"
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;"
                                        type="button" value="">
                                        Limpar
                                    </a>
                                    <input class="btn btn-light btn-sm"
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;"
                                        type="submit" value="Pesquisar">
                                    <a href="/incluir-empresa">
                                        <input class="btn btn-success btn-sm" type="button" name="novo"
                                            value="Novo+"
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin:5px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>{{-- Final Formulario de Inserção --}}
    <script>
        $(document).ready(function() {

            //Importa o select2 com tema do Bootstrap para a classe "select2"
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

        });
    </script>
@endsection
