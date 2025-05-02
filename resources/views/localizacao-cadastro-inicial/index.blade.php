@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <h5 class="card-header">Gerenciar Localização Cadastro Inicial</h5>
            <div class="card-body">
                <p class="card-text">
                <div class="row justify-content-around mb-3">
                    <div class="col">
                        <a href="{{ route('localizacao-cadastro-inicial.create') }}" class="btn btn-success">
                            Novo Cadastro Inicial
                        </a>
                    </div>
                </div>
                <table class="table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                    <thead class="text-center" style="background-color: #d6e3ff; color:#000;">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Cadastro Inicial</th>
                            <th scope="col">Remetente</th>
                            <th scope="col">Destinatario</th>
                            <th scope="col">Deposito Origem</th>
                            <th scope="col">Deposito Origem</th>
                            <th scope="col">Data Movimentação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection
