@extends('layouts.app')

@section('title')
    Gerenciar unidade medida
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
                                Cadastro de Unidade de Medida
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/unidade-medida/inserir">
                            @csrf
                            <div class="row" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-3 col-sm-12">
                                        Nova Unidade
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
                        <h5>Lista de Unidade de Medida</h5>
                        <div class="row">
                            <div class="col-12">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Unidade de Medida</th>
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
                                                    <a href="#"
                                                        class="btn btn-sm btn-outline-danger excluirSolicitacao"
                                                        data-tt="tooltip" style="font-size: 1rem; color:#303030"
                                                        data-placement="top" title="Excluir" data-bs-toggle="modal"
                                                        data-bs-target="#modalExcluirSolicitacao"
                                                        data-id="{{ $aquisicaos->id }}">
                                                        <i class="bi bi-trash"></i>
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
    </div>
    @include('cadastro-geral/popUp-alterar')
@endsection

@section('footerScript')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/js/pages/gerenciar-unidade-medida.init.js') }}"></script>
@endsection
