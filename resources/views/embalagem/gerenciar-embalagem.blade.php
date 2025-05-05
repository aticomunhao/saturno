@extends('layouts.app')

@section('title')
    Gerenciar Embalagens
@endsection

@section('content')
    <form class="form-horizontal mt-4" method="POST" action="/cad-inicial-material/compra-direta">
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="col-12" style="color: #355089">
                                    Gerenciar Embalagens
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <div style="display: flex; gap: 20px; align-items: flex-end;">
                                <div class="col-md-2 col-sm-12">Categoria do Material
                                    <br>
                                    <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                        id="categoria" name="categoria">
                                        <option value=""></option>
                                        @foreach ($categoria as $categorias)
                                            <option value="{{ $categorias->id }}" {{ old('categoria') }}>
                                                {{ $categorias->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-12">Nome Item Material
                                    <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                        id="nomeMaterial" name="nomeMaterial">
                                        <option value=""></option>
                                        @foreach ($nomeMaterial as $nomeMaterials)
                                            <option value="{{ $nomeMaterials->id }}" {{ old('nomeMaterial') }}>
                                                {{ $nomeMaterials->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-light btn-sm "
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px;"{{-- Botao submit do formulario de pesquisa --}}
                                        type="submit">Pesquisar
                                    </button>
                                    <a href="/gerenciar-aquisicao-material" type="button" class="btn btn-light btn-sm"
                                        style="box-shadow: 1px 2px 5px #000000; font-size: 1rem" value="">Limpar</a>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row" style="margin-left:5px">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item Material</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($result as $results)
                                            <tr>
                                                <td>{{ $results->id }}</td>
                                                <td>{{ $results->nome }}</td>

                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-warning"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditarEmbalagem"
                                                        style="font-size: 1rem; color:#303030" data-id="{{ $results->id }}"
                                                        title="Editar" data-nome="{{ $results->nome }}"
                                                        data-sigla="{{ $results->sigla }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#modalinativarEmbalagem"
                                                        style="font-size: 1rem; color:#303030"
                                                        data-id="{{ $results->id }}" title="Inativar"
                                                        data-nome="{{ $results->nome }}"
                                                        data-sigla="{{ $results->sigla }}">
                                                        <i class="bi bi-exclamation-circle"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#modalExcluirEmbalagem"
                                                        style="font-size: 1rem; color:#303030"
                                                        data-id="{{ $results->id }}" title="Excluir"
                                                        data-nome="{{ $results->nome }}"
                                                        data-sigla="{{ $results->sigla }}">
                                                        <i class="bi bi-trash"></i>
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
        {{-- Botões Confirmar e Cancelar --}}
        <div class="botões">
            <a href="/gerenciar-cadastro-inicial" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
        </div>
    </form>
@endsection
