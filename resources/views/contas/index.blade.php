@extends('layouts.app')
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <br>
    <div class="container-fluid">
        <div class="card" style="border-color: #355089;">
            <h5 class="card-header">Gerenciar Contas Contábeis</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <div class="row justify-content-between">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <a href="{{ route('conta-contabil.create') }}"><button class="btn btn-success" style="width:100%">Novo</button></a>
                        </div>
                    </div>
                </h5>
                <p class="card-text">
                <table {{-- Inicio da tabela de informacoes --}}
                    class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                    <thead style="text-align: center; ">{{-- inicio header tabela --}}
                        <tr style="background-color: #d6e3ff; color:#000;" class="align-middle">
                            <th>CODIGO</th>
                            <th>DESCRICAO</th>
                            <th>DATA INICIO</th>
                            <th>DATA FIM</th>
                            <th>TIPO</th>
                            <th>AÇÕES</th>

                        </tr>
                    </thead>{{-- Fim do header da tabela --}}
                    <tbody style="color:#000000; text-align: center;">{{-- Inicio body tabela --}}
                        @foreach ($contas_contabeis as $conta_contabil)
                            <tr>
                                <td>{{ $conta_contabil->getConcatenatedLevelsAttribute() }}</td>
                                <td>{{ $conta_contabil->descricao }}</td>
                                <td>{{ Carbon::parse($conta_contabil->data_inicio)->format('d/m/Y') }}</td>
                                <td>{{ isset($conta_contabil) ? Carbon::parse($conta_contabil->data_fim)->format('d/m/Y') : 'Sem Data Fim' }}
                                </td>

                                <td>{{ $conta_contabil->natureza_contabil->sigla }}</td>
                                <td>Editar-Visualizar</td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- Fim body da tabela --}}
                </table>
                </p>

            </div>
        </div>
    </div>
@endsection
