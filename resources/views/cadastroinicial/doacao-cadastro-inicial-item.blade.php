@extends('layouts.app')

@section('title')
    Termo de Doação
@endsection

@section('content')
    <form class="form-horizontal mt-4" method="POST" action="/cad-inicial-material/doacao">
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="col-12" style="color: #355089">
                                    Termo de Doação
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="row" style="margin-left: 5px">
                                <!-- Ambos os botões na mesma div -->
                                <div class="col-md d-flex justify-content-start">
                                    <button type="button" class="btn btn-success me-2" id="addMaterial"
                                        data-bs-toggle="modal" data-bs-target="#modalIncluirMaterial">
                                        Adicionar Material
                                    </button>
                                    <button type="button" class="btn btn-success" id="addTermo" data-bs-toggle="modal"
                                        data-bs-target="#modalIncluirTermo">
                                        Incluir Termo de Doação
                                    </button>
                                    <button type="button" class="btn me-2" id="sacolaBtn"
                                        style="background-color: rgb(199, 7, 7); color: white; margin-left: 5px;">
                                        SACOLA
                                    </button>
                                </div>
                                <div class="col-md d-flex justify-content-end" style="margin-right: 15px;">
                                    <button type="button" class="btn  btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#filtros"
                                        style="box-shadow: 3px 5px 6px #000000; background-color: rgb(231, 231, 69); ">
                                        GERAR RECIBO
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left:5px">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item Material</th>
                                            <th>Unidade de Medida</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($result as $results)
                                            <tr>
                                                <td>{{ $results->id ?? 'N/A' }}</td>
                                                <td>{{ $results->nome ?? 'N/A' }}</td>
                                                <td>{{ $results->unidadeMedida->sigla ?? '' }} -
                                                    {{ $results->unidadeMedida->nome ?? '' }}</td>
                                                <td>
                                                    @if ($results->ativo == 1)
                                                        <span class="badge bg-success">Ativo</span>
                                                    @else
                                                        <span class="badge bg-danger">Inativo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/gerenciar-embalagem/alterar/{{ $results->id }}"
                                                        class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                                        style="font-size: 1rem; color:#303030" data-placement="top"
                                                        title="Editar Embalagens">
                                                        <i class="bi bi-pencil"></i>
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
    <x-modal-incluir id="modalIncluirMaterial" labelId="modalIncluirMaterialLabel"
        action="{{ url('/incluir-material-doacao-cadastro-inicial/' . $idSolicitacao) }}" title="Inclusão de Material">
        <div class="row material-item">
            <div class="col-md-6" style="margin-top: 10px">
                <label>Categoria do Material</label>
                <select class="form-select  select2" id="categoriaMaterial" style="border: 1px solid #999999; padding: 5px;"
                    name="categoriaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaCategoria as $buscaCategorias)
                        <option value="{{ $buscaCategorias->id }}">
                            {{ $buscaCategorias->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6" style="margin-top: 10px">
                <label>Nome do Material</label>
                <select class="form-select js-nome-material select2" id="nomeMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="nomeMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-6" style="margin-top: 10px">
                <label>Tipo do Material</label>
                <select class="form-select select2" id="tipoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="tipoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaTipoMaterial as $buscaTipoMaterials)
                        <option value="{{ $buscaTipoMaterials->id }}">
                            {{ $buscaTipoMaterials->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Unid. Medida</label>
                <select class="form-select  select2" style="border: 1px solid #999999; padding: 5px;"
                    name="UnidadeMedidaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaUnidadeMedida as $buscaUnidadeMedidas)
                        <option value="{{ $buscaUnidadeMedidas->id }}">
                            {{ $buscaUnidadeMedidas->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Quantidade</label>
                <input type="number" class="form-control" name="quantidadeMaterial">
            </div>
        </div>
        <div class="row material-item" style="margin-top: 10px">
            <div class="col-md">
                <label>Marca</label>
                <select class="form-select js-marca-material select2" id="marcaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="marcaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md">
                <label>Tamanho</label>
                <select class="form-select js-tamanho-material select2" id="tamanhoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="tamanhoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md">
                <label>Cor</label>
                <select class="form-select js-cor-material select2" id="corMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="corMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md">
                <label>Fase Etária</label>
                <select class="form-select js-fase-material select2" id="faseEtariaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="faseEtariaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md">
                <label>Sexo</label>
                <select class="form-select js-sexo-material select2" id="sexoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="sexoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaSexo as $buscaSexos)
                        <option value="{{ $buscaSexos->id }}">
                            {{ $buscaSexos->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-modal-incluir>
    <x-modal-incluir id="modalIncluirTermo" labelId="modalIncluirTermoLabel"
        action="" title="Inclusão de Termo">
        <div class="row termo">

        </div>
    </x-modal-incluir>
    {{-- Botão de SACOLA --}}
    <script>
        document.getElementById('sacolaBtn').addEventListener('click', function() {
            const btn = this;
            const isActive = btn.classList.toggle('ativo');
            btn.style.backgroundColor = isActive ? 'rgb(3, 109, 3)' : 'rgb(199, 7, 7)';
        });
    </script>
@endsection
