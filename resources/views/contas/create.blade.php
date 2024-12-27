@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card" style="border-color: #355089;">
            <div class="card-header">
                <h5 style="color: #355089;">Inserir Conta Contabil</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                <div class="row d-flex">
                    <div class="col-md-2 col-sm-12">
                        <label for="idcatalogocontabil">Tipo Catalogo: </label>
                        <select class="form-select" name="catalogo_contabil" id="idcatalogocontabil">
                            {{-- <option value="1">One</option> --}}
                            @foreach ($catalogo_conta_contabil as $conta_contabil)
                                <option value="{{ $conta_contabil->id }}">{{ $conta_contabil->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="iddescricao">Descricao: </label>
                        <input type="text" name="descricao" id="iddescricao" class="form-control"
                            placeholder="Descrição Conta Contabil">
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="idnaturezacontabil">Natureza: </label>
                        <select name="natureza_contabil" id="idnaturezacontabil" class="form-select">
                            @foreach ($natureza_conta_contabil as $natureza_contabil)
                                <option value="{{ $natureza_contabil->id }}">{{ $natureza_contabil->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="idgrupocontabil">Grupo: </label>
                        <select name="grupo_contabil" id="idgrupocontabil" class="form-select">
                            @foreach ($grupo_conta_contabil as $grupo_contabil)
                                <option value="{{ $grupo_contabil->id }}">{{ $grupo_contabil->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="idclassecontabil">Classe</label>
                        <select name="classe_contabil" id="idclassecontabil" class="form-select">
                            @foreach ($classe_conta_contabil as $classe_contabil)
                                <option value="{{ $classe_contabil->id }}">{{ $classe_contabil->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row d-flex">
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel1">Nivel 1:</label>
                        <select name="nivel_1" id="idnivel1" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel2">Nivel 2:</label>
                        <select name="nivel_2" id="idnivel2" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel3">Nivel 3:</label>
                        <select name="nivel_3" id="idnivel3" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel4">Nivel 4:</label>
                        <select name="nivel_4" id="idnivel4" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel5">Nivel 5:</label>
                        <select name="nivel_5" id="idnivel5" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="idnivel6">Nivel 6:</label>
                        <select name="nivel_6" id="idnivel6" class="form-select">
                            @foreach ($numeros as $numero)
                                <option value="{{ $numero }}">{{ $numero }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <br>
                <div class="row d-flex justify-content-around">
                    <div class="col-md-3">
                        <a href="{{ url()->previous() }}"><button class="btn-danger btn"
                                style="width: 100%">Cancelar</button></a>
                    </div>
                    <div class="col-md-3">
                        <button class="btn-primary btn" style="width: 100%" type="submit">Enviar</button>
                    </div>
                </div>
                </p>
            </div>
            <br>

        </div>
    </div>
@endsection
