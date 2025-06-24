@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header" style="color:blue">Gerenciar Relação Depósito/Setor</h5>
            <div class="card-body">
                <p class="card-text">
                <div class="row justify-content-beteween">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ route('relacao-deposito-setor.create') }}"><button class="btn btn-success"
                                style="width: 100%">Novo</button></a>
                    </div>
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                    <thead>
                        <tr style="background-color: #d6e3ff; font-size:14px; color:#000000">
                            <th scope="col">Deposito</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relacoes_deposito_setor as $relacao)
                            <tr>
                                <td>{{ $relacao->Deposito->nome }}</td>
                                <td>{{ $relacao->Setor->nome }}</td>
                                <td>
                                    <a href="{{ route('relacao-deposito-setor.edit', $relacao->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    {{-- <form action="{{ route('relacao-deposito-setor.destroy', $relacao->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection
