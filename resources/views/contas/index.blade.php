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
                            <a href="{{ route('conta-contabil.create') }}"><button class="btn btn-success"
                                    style="width:100%">Novo</button></a>
                        </div>
                    </div>
                </h5>
                <p class="card-text">
                <table {{-- Inicio da tabela de informacoes --}}
                    class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                    <thead style="text-align: center; ">{{-- inicio header tabela --}}
                        <tr style="background-color: #d6e3ff; color:#000;" class="align-middle">
                            <th class="col-auto">ID</th>
                            <th class="col-auto">Tipo</th>
                            {{-- CODIGO --}}
                            <th class="col-auto">CLASSIFICACAO </th>
                            <th class="col-auto">DESCRIÇÃO</th>
                            <th class="col-auto">TIPO</th>
                            <th class="col-auto">GRUPO</th>
                            <th class="col-auto">GRAU</th>
                            <th class="col-auto">NIVEL 1</th>
                            <th class="col-auto">NIVEL 2</th>
                            <th class="col-auto">NIVEL 3</th>
                            <th class="col-auto">NIVEL 4</th>
                            <th class="col-auto">NIVEL 5</th>
                            <th class="col-auto">NIVEL 6</th>

                            <th class="col-auto">AÇÕES</th>

                        </tr>
                    </thead>{{-- Fim do header da tabela --}}
                    <tbody style="color:#000000; text-align: center;">{{-- Inicio body tabela --}}
                        @foreach ($contas_contabeis as $conta_contabil)
                            <tr>
                                <td>{{ $conta_contabil->id }}</td>
                                <th>{{ $conta_contabil->catalogo_contabil->nome }}</th>
                                <td>{{ $conta_contabil->getConcatenatedLevelsAttribute() }}</td>
                                <td>{{ $conta_contabil->descricao }}</td>
                                <td>{{ $conta_contabil->natureza_contabil->sigla }}</td>
                                <td>{{ $conta_contabil->grupo_contabil->nome }}</td>
                                <td>{{ $conta_contabil->grau }}</td>
                                <td>{{ $conta_contabil->nivel_1 }}</td>
                                <td>{{ $conta_contabil->nivel_2 }}</td>
                                <td>{{ $conta_contabil->nivel_3 }}</td>
                                <td>{{ $conta_contabil->nivel_4 }}</td>
                                <td>{{ $conta_contabil->nivel_5 }}</td>
                                <td>{{ $conta_contabil->nivel_6 }}</td>

                                <td> <i class="fas fa-file-pen"></i> -Visualizar</td>
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
