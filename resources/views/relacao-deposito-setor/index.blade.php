@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

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
                            <th scope="col">Setor Responsavel</th>
                            <th scope="col">Data Inicio Responsabilidade</th>
                            <th scope="col">Data Fim Responsabilidade</th>

                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relacoes_deposito_setor as $relacao)
                            <tr>
                                <td>{{ $relacao->Deposito->nome }}</td>
                                <td>{{ $relacao->Setor->nome }}</td>
                                <th scope="col">
                                    {{ $relacao->dt_inicio ? Carbon::parse($relacao->dt_inicio)->format('d/m/Y') : '--' }}
                                </th>
                                <th scope="col">
                                    {{ $relacao->dt_fim ? Carbon::parse($relacao->dt_fim)->format('d/m/Y') : '--' }}</th>
                                <td>
                                    <a href="{{ route('relacao-deposito-setor.edit', $relacao->id) }}"
                                        class="btn btn-outline-warning btn-sm" style="font-size: 1rem; color: #303030"
                                        data-placement="top" title="Editar"><i class="bi bi-pencil"></i></a>

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
