@extends('layouts.app')

@section('title')
    Cadastrar Embalagens
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
                                                    <a href="#" class="btn btn-sm btn-outline-warning"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditarEmbalagem"
                                                        style="font-size: 1rem; color:#303030" data-id="{{ $results->id }}" title="Editar"
                                                        data-nome="{{ $results->nome }}" data-sigla="{{ $results->sigla }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#modalExcluirEmbalagem"
                                                        style="font-size: 1rem; color:#303030" data-id="{{ $results->id }}" title="Inativar"
                                                        data-nome="{{ $results->nome }}" data-sigla="{{ $results->sigla }}">
                                                        <i class="bi bi-exclamation-circle"></i>
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
    <x-modal-editar id="modalEditarEmbalagem" labelId="modalEditarEmbalagemLabel" title="Editar Embalagem">
        @method('PUT') {{-- para usar o método HTTP PUT --}}
        <input type="hidden" id="edit-id" name="id">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                Nome da Embalagem
                <input class="form-control" type="text" id="edit-nome" name="unidade_med" required>
            </div>
            <div class="col-md-2 col-sm-12">
                Sigla
                <input class="form-control" type="text" id="edit-sigla" name="sigla" required>
            </div>
        </div>
    </x-modal-editar>
    <x-modal-Excluir id="modalExcluirEmbalagem" labelId="modalExcluirEmbalagemLabel" title="Excluir Embalagem">
        <input type="hidden" name="id" id="excluir-id">
        <p>
            <!-- Modal body -->
            deseja realmente excluir a embalagem <strong id="excluir-nome" style="color: red"></strong> com a sigla <strong
                id="excluir-sigla" style="color: red"></strong>?
        </p>
    </x-modal-Excluir>
    <script>
        const modalEditar = document.getElementById('modalEditarEmbalagem');
        modalEditar.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nome = button.getAttribute('data-nome');
            const sigla = button.getAttribute('data-sigla');

            modalEditar.querySelector('#edit-id').value = id;
            modalEditar.querySelector('#edit-nome').value = nome;
            modalEditar.querySelector('#edit-sigla').value = sigla;

            const form = modalEditar.querySelector('form');
            form.action = `/cad-embalagem/alterar/${id}`;
        });
    </script>
    <script>
        const modalExcluir = document.getElementById('modalExcluirEmbalagem');
        modalExcluir.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nome = button.getAttribute('data-nome');
            const sigla = button.getAttribute('data-sigla');

            modalExcluir.querySelector('#excluir-id').value = id;
            modalExcluir.querySelector('#excluir-nome').textContent = nome;
            modalExcluir.querySelector('#excluir-sigla').textContent = sigla;

            const form = modalExcluir.querySelector('form');
            form.action = `/cad-embalagem/excluir/${id}`;
        });
    </script>
@endsection
