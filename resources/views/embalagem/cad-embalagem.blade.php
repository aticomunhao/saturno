@extends('layouts.app')

@section('title')
    Cdastrar Embalagens
@endsection

@section('content')
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="col-12" style="color: #355089">
                                    Cadastrar Embalagens
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                                <form class="form-horizontal" method="POST" action="/cad-embalagem/inserir">
                                    @csrf
                                    <div class="row" style="margin-left:5px">
                                        <div style="display: flex; gap: 20px; align-items: flex-end;">
                                            <div class="col-md-3 col-sm-12">
                                                Nova Embalagem
                                                <input class="form-control" type="text" id="unidade_med" name="unidade_med"
                                                    required>
                                            </div>
                                            <div class="col-md-1 col-sm-12">
                                                Sigla
                                                <input class="form-control" type="text" id="sigla" name="sigla" required>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <button type="submit" class="btn btn-success">CADASTRAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <h5>Lista de Unidade de Embalagens</h5>
                                <div class="row">
                                    <div class="col-12">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Embalagem</th>
                                                    <th>Sigla</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($result as $results)
                                                    <tr>
                                                        <td>{{ $results->id }}</td>
                                                        <td>{{ $results->nome }}</td>
                                                        <td>{{ $results->sigla }}</td>
                                                        <td>
                                                            <button type="button" value="{{ $results->id }}" id="btnAlterarUniMed"
                                                                class="btn btn-warning waves-effect waves-light classBtnAlterar"
                                                                data-toggle="modal"
                                                                data-target=".bs-example-modal-lg">Alterar</button>
                                                                <a href="/incluir-aquisicao-material-2/{{ $aquisicaos->id }}"
                                                                    class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                                    title="Editar">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                            <a href="/unidade-medida/excluir/{{ $results->id }}">
                                                                <input class="btn btn-danger" type="button" value="Excluir">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endForeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Botões Confirmar e Cancelar --}}
        <div class="botões">
            <a href="/gerenciar-cadastro-inicial" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
        </div>
    </form>
    <x-modal-Excluir id="modalExcluir" labelId="modalExcluirLabel"
        action="" title="Escreva um título">
        <div class="row">
            <!-- Modal body -->
        </div>
    </x-modal-Excluir>
@endsection
