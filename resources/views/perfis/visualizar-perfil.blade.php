@extends('layouts.app')
@section('head')
    <title>Visualizar Perfil</title>
@endsection
@section('content')
    <br />
    <div class="container">
        <div class="card">
            <div class="card-header">
                Visualizar Perfil
            </div>
            <div class="card-body">
                <br>
                <div class="row justify-content-start">
                    <form method="POST" action="/armazenar-perfis">
                        @csrf
                        <div class="row col-10 offset-1" style="margin-top:none">
                            <div class="col-12">
                                Nome
                                <input type="text" class="form-control" id="nome" name="nome" maxlength="30"
                                    required="required" value="{{ $perfil->descricao }}" disabled>

                                <hr />
                            </div>
                            <div class="col-12">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead class="table-info">
                                        <tr>
                                            <th>
                                             Funcionalidades Autorizadas
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rotas as $rota)
                                        <tr>
                                            <td>{{ $rota->nome }}</td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                  </table>
                            </div>


                            <center>
                                <div class="col-12 mt-3">
                                    <a href="/gerenciar-perfis" class="btn btn-danger col-3">
                                        Retornar
                                    </a>

                                </div>
                            </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5'
            });
        });
    </script>
@endsection
