@extends('layouts.app')
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <br>
    <div class="container-fluid">
        <div class="card shadow" style="border-color: #355089;">
            <h5 class="card-header">Gerenciar Contas Contábeis</h5>
            <div class="card-body">
                <form action="{{ route('conta-contabil.index') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <label for="iddescricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control border-secondary" id="iddescricao" name="descricao"
                                placeholder="Descrição da Conta Contabil">

                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idgrupocontabil" class="form-label">Grupo Contabil</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="grupo_contabil" id="idgrupocontabil">
                                    <option value=></option>
                                    @foreach ($grupos_contabeis as $grupo_contabil)
                                        <option value="{{ $grupo_contabil->id }}">{{ $grupo_contabil->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <label for="idnaturezacontabil" class="form-label">Natureza Contabil</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="natureza_contabil"
                                    id="idnaturezacontabil">
                                    <option value="
                                    "></option>
                                    @foreach ($naturezas_contabeis as $natureza_contabil)
                                        <option value="{{ $natureza_contabil->id }}">{{ $natureza_contabil->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Catalogo Contabil</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="catalogo_contabil"
                                    id="idcatalogocontabil">
                                    <option value="
                                    "></option>
                                    @foreach ($catalogos_contabeis as $catalogo_contabil)
                                        <option value="{{ $catalogo_contabil->id }}"  {{ $catalogo_contabil->id == request('catalogo_contabil') ? 'selected' : '' }}  >{{ $catalogo_contabil->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idclassecontabil" class="form-label">Classe Contabil</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="classe_contabil" id="idclassecontabil">
                                    <option value="
                                    "></option>
                                    @foreach ($classes_contabeis as $classe_contabil)
                                        <option value="{{ $classe_contabil->id }}">{{ $classe_contabil->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <button type="submit" class="btn btn-secondary" style="width: 100%">Pesquisar</button>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-black fw-bold border-bottom pb-2">Classificação</h4>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 1</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="nivel_1" id="idcatalogocontabil">
                                    <option value="
                                    "></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 2</label>
                            <div class="mb-3">

                                <select class="form-select border-secondary" name="nivel_2" id="idcatalogocontabil">
                                    <option value=""></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 3</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="nivel_3" id="idcatalogocontabil">
                                    <option value="
                                    "></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 4</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="nivel_4" id="idcatalogocontabil">
                                    <option value=""></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 5</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="nivel_5" id="idcatalogocontabil">
                                    <option value=""></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="idcatalogocontabil" class="form-label">
                                Nivel 6</label>
                            <div class="mb-3">
                                <select class="form-select border-secondary" name="nivel_6" id="idcatalogocontabil">
                                    <option value=""></option>
                                    @foreach ($numeros as $numero)
                                        <option value="{{ $numero }}">{{ $numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
                <h5 class="card-title">
                    <div class="row justify-content-end">

                        <div class="col-md-2 col-sm-12">
                            <a href="{{ route('conta-contabil.create') }}"><button class="btn btn-success"
                                    style="inline-size:100%">Novo</button></a>
                        </div>
                    </div>
                </h5>
                <p class="card-text">
                <div class="table-responsive">
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
                                    <td>
                                        <a href="{{ route('conta-contabil.edit', $conta_contabil->id) }}"
                                            class="btn btn-outline-warning">
                                            <i class="bi bi-pencil-square" style="color: #1B1e20"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $conta_contabil->id }}">
                                            <i class="fa-solid fa-trash" style="color: #1B1e20"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $conta_contabil->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel{{ $conta_contabil->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h1 class="modal-title fs-5"
                                                            id="staticBackdropLabel{{ $conta_contabil->id }}">Confirmar
                                                            Exclusão</h1>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Tem certeza de que deseja inativar o item de classificação:
                                                            <b>{{ $conta_contabil->getConcatenatedLevelsAttribute() }}</b>?
                                                        </p>
                                                        <p>Esta ação não pode ser desfeita.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <a
                                                            href="{{ route('conta-contabil.inativar', ['id' => $conta_contabil->id]) }}"><button
                                                                type="button" class="btn btn-danger">Excluir</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- Fim body da tabela --}}
                    </table>
                </div>
                </p>

            </div>
        </div>
    </div>
@endsection
