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
                                <th class="col">Nome</th>
                                <th class="col">Sigla</th>
                                <th class="col">Sala</th>
                                <th class="col">Tipo de Depósito</th>
                                <th class="col">Ativo</th>
                                <th class="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($depositos as $deposito)
                                <tr>
                                    <td>{{ $deposito->nome }}</td>
                                    <td>{{ $deposito->sigla }}</td>
                                    <td>{{ optional($deposito->sala)->nome }}</td>
                                    <td>{{ optional($deposito->tipoDeposito)->nome }}</td>
                                    <td>{{ $deposito->ativo ? 'Sim' : 'Não' }}</td>
                                    <td> <a href="{{ route('deposito.edit', ['id' => $deposito->id]) }}"
                                            class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                            style="font-size: 1rem; color: #303030;">
                                            <i class="bi bi-pencil"></i></a>
                                        <a href="{{ route('deposito.show', ['id' => $deposito->id]) }}"
                                            class="btn btn-sm btn-outline-secondary" data-tt="tooltip"
                                            style="font-size: 1rem; color: #303030;">
                                            <i class="bi bi-search"></i></a>
                                        @if ($deposito->ativo)
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $deposito->id }}"
                                                data-tt="tooltip" style="font-size: 1rem; color: #303030;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <x-modal-excluir :id="'modalExcluir' . $deposito->id" :labelId="'modalExcluirLabel' . $deposito->id" :action="route('deposito.delete', $deposito->id)"
                                                title="Excluir Depósito: {{ $deposito->nome }}">
                                                <p>Tem certeza de que deseja excluir o depósito
                                                    <strong>{{ $deposito->nome }}</strong>?
                                                </p>
                                            </x-modal-excluir>
                                        @endif
                                        {{-- Modal Excluir --}}
                                    </td>

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
