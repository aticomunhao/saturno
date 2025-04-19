@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Gerenciar Depósitos
            </div>
            <div class="card-body">
                <br>
                <div class="row justify-content-between">

                    <div class="col-md-2 col-sm-12">
                        <a href="{{ route('deposito.create') }}"><button class="btn btn-success"
                                style="inline-size:100%">Novo</button></a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table {{-- Inicio da tabela de informacoes --}}
                        class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                        <thead style="text-align: center; ">{{-- inicio header tabela --}}
                            <tr style="background-color: #d6e3ff; color:#000;" class="align-middle">
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th>Sala</th>
                                <th>Tipo de Depósito</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($depositos as $deposito)
                                <tr>
                                    <td>{{ $deposito->nome }}</td>
                                    <td>{{ $deposito->sigla }}</td>
                                    <td>{{ $deposito->sala }}</td>
                                    <td>{{ $deposito->id_tp_deposito }}</td>
                                    <td>{{ $deposito->ativo ? 'Sim' : 'Não' }}</td>
                                </tr>
                            @endforeach
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
