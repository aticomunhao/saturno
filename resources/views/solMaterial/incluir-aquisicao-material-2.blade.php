@extends('layouts.app')

@section('title')
    Incluir Aquisição de Material
@endsection

@section('content')
    <form method="POST" action="/salvar-proposta-material/{{ $idSolicitacao }}" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="col-12" style="color: #355089">
                                    Incluir Solicitação de Material
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Selecione o Tipo de Solicitação</h5>
                            <hr>
                            <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                                <!-- Botões Por Material e Por Empresa no centro -->
                                <div style="flex-grow: 1; display: flex; justify-content: center;">
                                    <div class="btn-group" role="group" aria-label="Tipo de Solicitação">
                                        <button type="button" class="btn btn-primary" id="btnPorMaterial"
                                            aria-selected="true">
                                            Por Material
                                        </button>
                                        <button type="button" class="btn btn-secondary" id="btnPorEmpresa"
                                            aria-selected="false">
                                            Por Empresa
                                        </button>
                                    </div>
                                </div>
                                <!-- Botão Adicionar Material à direita -->
                                <div>
                                    <button type="button" class="btn btn-success" id="addMaterial" data-bs-toggle="modal"
                                        data-bs-target="#modalIncluirMaterial">
                                        Adicionar Material
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="col-12 mt-3" id="listaMateriais" style="display: none;">
                                    {{-- card por material --}}
                                    @foreach ($materiais as $index => $material)
                                        <div class="card" id="card-material" style="margin-bottom: 10px">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="row material-item flex-grow-1">
                                                    <div class="col-md-4">
                                                        <label>Categoria do Material</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoCategoria->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nome do Material</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->nome ?? 'Não especificado' }}" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Unid. Medida</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoUnidadeMedida->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Quantidade</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->quantidade ?? 'Não especificado' }}">
                                                    </div>
                                                </div>
                                                <!-- Botões de Minimizar e Fechar -->
                                                <div class="card-actions position-absolute" style="top: 5px; right: 5px;">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary toggle-card-content"
                                                        data-bs-toggle="tooltip" title="Minimizar/Maximizar">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger open-delete-modal"
                                                        data-bs-toggle="modal" data-bs-target="#modalExcluirMaterial"
                                                        data-material-id="{{ $material->id }}"
                                                        data-material-name="{{ $material->nome }}" data-bs-toggle="tooltip"
                                                        title="Excluir">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body d-none">
                                                <div class="row material-item">
                                                    <div class="col-md">
                                                        <label>Marca</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoMarca->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Tamanho</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoTamanho->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Cor</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoCor->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Fase Etária</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoFaseEtaria->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Sexo</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoSexo->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="card mt-3">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Proposta Preferida</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Número da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Número da Proposta Principal</label>
                                                                <input type="text" class="form-control"
                                                                    name="numero1[]"
                                                                    placeholder="Digite o Número da proposta">
                                                            </div>
                                                            <!-- Nome da Empresa -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Nome da Empresa Principal</label>
                                                                <select class="form-select select2" name="razaoSocial1[]"
                                                                    style="border: 1px solid #999999; padding: 5px;">
                                                                    <option></option>
                                                                    @foreach ($buscaEmpresa as $buscaEmpresas)
                                                                        <option value="{{ $buscaEmpresas->id }}">
                                                                            {{ $buscaEmpresas->razaosocial }} -
                                                                            {{ $buscaEmpresas->nomefantasia }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- Valor -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Valor da Proposta Principal</label>
                                                                <input type="text"
                                                                    class="form-control valor valor-proposta"
                                                                    name="valor1[]"
                                                                    placeholder="Digite o valor da proposta">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- Data da Criação da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data da Criação da
                                                                    Proposta Principal</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_inicial1[]"
                                                                    placeholder="Digite a data da proposta">
                                                            </div>

                                                            <!-- Data Limite da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data Limite da Proposta Principal</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_final1[]"
                                                                    placeholder="Digite a data final do prazo da proposta">
                                                            </div>

                                                            <!-- Arquivo da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Arquivo da Proposta Principal</label>
                                                                <input type="file" class="form-control"
                                                                    id="uploadProposta1" name="arquivoProposta1[]"
                                                                    accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!-- Tempo de Garantia -->
                                                            <div id="tempoGarantia" class="col-md-4 mb-3">
                                                                <label>Tempo de Garantia (em
                                                                    dias)</label>
                                                                <input type="number" class="form-control"
                                                                    id="tempoGarantiaInput" name="tempoGarantia1[]"
                                                                    placeholder="Digite o tempo de garantia">
                                                            </div>

                                                            <!-- Link da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Link da Proposta Principal</label>
                                                                <input type="text" class="form-control mt-2"
                                                                    id="linkProposta1" name="linkProposta1[]"
                                                                    placeholder="Link da Proposta">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mt-3">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Segunda Proposta</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Número da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Número da 2ª Proposta</label>
                                                                <input type="text" class="form-control"
                                                                    name="numero2[]"
                                                                    placeholder="Digite o Número da proposta">
                                                            </div>

                                                            <!-- Nome da Empresa -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Nome 2ª Empresa</label>
                                                                <select class="form-select select2" name="razaoSocial2[]"
                                                                    style="border: 1px solid #999999; padding: 5px;">
                                                                    <option></option>
                                                                    @foreach ($buscaEmpresa as $buscaEmpresas)
                                                                        <option value="{{ $buscaEmpresas->id }}">
                                                                            {{ $buscaEmpresas->razaosocial }} -
                                                                            {{ $buscaEmpresas->nomefantasia }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Valor -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Valor da 2ª Proposta</label>
                                                                <input type="text"
                                                                    class="form-control valor valor-proposta"
                                                                    name="valor2[]"
                                                                    placeholder="Digite o valor da proposta">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!-- Data da Criação da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data da Criação da 2ª
                                                                    Proposta</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_inicial2[]"
                                                                    placeholder="Digite a data da proposta">
                                                            </div>

                                                            <!-- Data Limite da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data Limite da 2ª Proposta</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_final2[]"
                                                                    placeholder="Digite a data final do prazo da proposta">
                                                            </div>

                                                            <!-- Arquivo da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Arquivo da 2ª Proposta</label>
                                                                <input type="file" class="form-control"
                                                                    id="uploadProposta2" name="arquivoProposta2[]"
                                                                    accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!-- Tempo de Garantia -->
                                                            <div id="tempoGarantia" class="col-md-4 mb-3">
                                                                <label>Tempo de Garantia (em
                                                                    dias)</label>
                                                                <input type="number" class="form-control"
                                                                    id="tempoGarantiaInput2" name="tempoGarantia2[]"
                                                                    placeholder="Digite o tempo de garantia">
                                                            </div>

                                                            <!-- Link da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Link da 2ª Proposta</label>
                                                                <input type="text" class="form-control mt-2"
                                                                    id="linkProposta2" name="linkProposta2[]"
                                                                    placeholder="Link da Proposta">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mt-3">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Terceira Proposta</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Número da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Número da 3ª Proposta</label>
                                                                <input type="text" class="form-control"
                                                                    name="numero3[]"
                                                                    placeholder="Digite o Número da proposta">
                                                            </div>

                                                            <!-- Nome da Empresa -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Nome 3ª Empresa</label>
                                                                <select class="form-select select2" name="razaoSocial3[]"
                                                                    style="border: 1px solid #999999; padding: 5px;">
                                                                    <option></option>
                                                                    @foreach ($buscaEmpresa as $buscaEmpresas)
                                                                        <option value="{{ $buscaEmpresas->id }}">
                                                                            {{ $buscaEmpresas->razaosocial }} -
                                                                            {{ $buscaEmpresas->nomefantasia }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Valor -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Valor da 3ª Proposta</label>
                                                                <input type="text"
                                                                    class="form-control valor valor-proposta"
                                                                    name="valor3[]"
                                                                    placeholder="Digite o valor da proposta">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!-- Data da Criação da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data da Criação da 3ª
                                                                    Proposta</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_inicial3[]"
                                                                    placeholder="Digite a data da proposta">
                                                            </div>

                                                            <!-- Data Limite da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Data Limite da 3ª Proposta</label>
                                                                <input type="date" class="form-control"
                                                                    name="dt_final3[]"
                                                                    placeholder="Digite a data final do prazo da proposta">
                                                            </div>

                                                            <!-- Arquivo da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Arquivo da 3ª Proposta</label>
                                                                <input type="file" class="form-control"
                                                                    id="uploadProposta3" name="arquivoProposta3[]"
                                                                    accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!-- Tempo de Garantia -->
                                                            <div id="tempoGarantia" class="col-md-4 mb-3">
                                                                <label>Tempo de Garantia (em
                                                                    dias)</label>
                                                                <input type="number" class="form-control"
                                                                    id="tempoGarantiaInput3" name="tempoGarantia3[]"
                                                                    placeholder="Digite o tempo de garantia">
                                                            </div>

                                                            <!-- Link da Proposta -->
                                                            <div class="col-md-4 mb-3">
                                                                <label>Link da 3ª Proposta</label>
                                                                <input type="text" class="form-control mt-2"
                                                                    id="linkProposta3" name="linkProposta3[]"
                                                                    placeholder="Link da Proposta">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12 mt-3" id="listaEmpresa" style="display: block;">
                                    {{-- card primeira proposta --}}
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Proposta Preferida</h5>
                                            <!-- Botões de Minimizar e Fechar -->
                                            <div class="card-actions position-absolute" style="top: 5px; right: 5px;">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary toggle-card-content"
                                                    data-bs-toggle="tooltip" title="Minimizar/Maximizar">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body d-none">
                                            <div class="row">
                                                <!-- Número da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Número da Proposta Principal</label>
                                                    <input type="text" class="form-control" name="numero1[]"
                                                        placeholder="Digite o Número da proposta">
                                                </div>
                                                <!-- Nome da Empresa -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Nome da Empresa Principal</label>
                                                    <select class="form-select select2" name="razaoSocial1[]"
                                                        style="border: 1px solid #999999; padding: 5px;">
                                                        <option></option>
                                                        @foreach ($buscaEmpresa as $buscaEmpresas)
                                                            <option value="{{ $buscaEmpresas->id }}">
                                                                {{ $buscaEmpresas->razaosocial }} -
                                                                {{ $buscaEmpresas->nomefantasia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Valor -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Valor da Proposta Principal</label>
                                                    <input type="text" class="form-control valor valor-proposta"
                                                        name="valor1[]" placeholder="Digite o valor da proposta">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Data da Criação da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data da Criação da
                                                        Proposta Principal</label>
                                                    <input type="date" class="form-control" name="dt_inicial1[]"
                                                        placeholder="Digite a data da proposta">
                                                </div>

                                                <!-- Data Limite da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data Limite da Proposta Principal</label>
                                                    <input type="date" class="form-control" name="dt_final1[]"
                                                        placeholder="Digite a data final do prazo da proposta">
                                                </div>

                                                <!-- Arquivo da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Arquivo da Proposta Principal</label>
                                                    <input type="file" class="form-control" id="uploadProposta1"
                                                        name="arquivoProposta1[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Tempo de Garantia -->
                                                <div id="tempoGarantia" class="col-md-4 mb-3">
                                                    <label>Tempo de Garantia (em
                                                        dias)</label>
                                                    <input type="number" class="form-control" id="tempoGarantiaInput"
                                                        name="tempoGarantia1[]" placeholder="Digite o tempo de garantia">
                                                </div>

                                                <!-- Link da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Link da Proposta Principal</label>
                                                    <input type="text" class="form-control mt-2" id="linkProposta1"
                                                        name="linkProposta1[]" placeholder="Link da Proposta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card segunda proposta --}}
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Segunda Proposta</h5>
                                            <!-- Botões de Minimizar e Fechar -->
                                            <div class="card-actions position-absolute" style="top: 5px; right: 5px;">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary toggle-card-content"
                                                    data-bs-toggle="tooltip" title="Minimizar/Maximizar">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body d-none">
                                            <div class="row">
                                                <!-- Número da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Número da 2ª Proposta</label>
                                                    <input type="text" class="form-control" name="numero2[]"
                                                        placeholder="Digite o Número da proposta">
                                                </div>

                                                <!-- Nome da Empresa -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Nome 2ª Empresa</label>
                                                    <select class="form-select select2" name="razaoSocial2[]"
                                                        style="border: 1px solid #999999; padding: 5px;">
                                                        <option></option>
                                                        @foreach ($buscaEmpresa as $buscaEmpresas)
                                                            <option value="{{ $buscaEmpresas->id }}">
                                                                {{ $buscaEmpresas->razaosocial }} -
                                                                {{ $buscaEmpresas->nomefantasia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Valor -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Valor da 2ª Proposta</label>
                                                    <input type="text" class="form-control valor valor-proposta"
                                                        name="valor2[]" placeholder="Digite o valor da proposta">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Data da Criação da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data da Criação da 2ª
                                                        Proposta</label>
                                                    <input type="date" class="form-control" name="dt_inicial2[]"
                                                        placeholder="Digite a data da proposta">
                                                </div>

                                                <!-- Data Limite da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data Limite da 2ª Proposta</label>
                                                    <input type="date" class="form-control" name="dt_final2[]"
                                                        placeholder="Digite a data final do prazo da proposta">
                                                </div>

                                                <!-- Arquivo da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Arquivo da 2ª Proposta</label>
                                                    <input type="file" class="form-control" id="uploadProposta2"
                                                        name="arquivoProposta2[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Tempo de Garantia -->
                                                <div id="tempoGarantia" class="col-md-4 mb-3">
                                                    <label>Tempo de Garantia (em
                                                        dias)</label>
                                                    <input type="number" class="form-control" id="tempoGarantiaInput2"
                                                        name="tempoGarantia2[]" placeholder="Digite o tempo de garantia">
                                                </div>

                                                <!-- Link da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Link da 2ª Proposta</label>
                                                    <input type="text" class="form-control mt-2" id="linkProposta2"
                                                        name="linkProposta2[]" placeholder="Link da Proposta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card terceira proposta --}}
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Terceira Proposta</h5>
                                            <!-- Botões de Minimizar e Fechar -->
                                            <div class="card-actions position-absolute" style="top: 5px; right: 5px;">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary toggle-card-content"
                                                    data-bs-toggle="tooltip" title="Minimizar/Maximizar">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body d-none">
                                            <div class="row">
                                                <!-- Número da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Número da 3ª Proposta</label>
                                                    <input type="text" class="form-control" name="numero3[]"
                                                        placeholder="Digite o Número da proposta">
                                                </div>

                                                <!-- Nome da Empresa -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Nome 3ª Empresa</label>
                                                    <select class="form-select select2" name="razaoSocial3[]"
                                                        style="border: 1px solid #999999; padding: 5px;">
                                                        <option></option>
                                                        @foreach ($buscaEmpresa as $buscaEmpresas)
                                                            <option value="{{ $buscaEmpresas->id }}">
                                                                {{ $buscaEmpresas->razaosocial }} -
                                                                {{ $buscaEmpresas->nomefantasia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Valor -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Valor da 3ª Proposta</label>
                                                    <input type="text" class="form-control valor valor-proposta"
                                                        name="valor3[]" placeholder="Digite o valor da proposta">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Data da Criação da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data da Criação da 3ª
                                                        Proposta</label>
                                                    <input type="date" class="form-control" name="dt_inicial3[]"
                                                        placeholder="Digite a data da proposta">
                                                </div>

                                                <!-- Data Limite da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Data Limite da 3ª Proposta</label>
                                                    <input type="date" class="form-control" name="dt_final3[]"
                                                        placeholder="Digite a data final do prazo da proposta">
                                                </div>

                                                <!-- Arquivo da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Arquivo da 3ª Proposta</label>
                                                    <input type="file" class="form-control" id="uploadProposta3"
                                                        name="arquivoProposta3[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Tempo de Garantia -->
                                                <div id="tempoGarantia" class="col-md-4 mb-3">
                                                    <label>Tempo de Garantia (em
                                                        dias)</label>
                                                    <input type="number" class="form-control" id="tempoGarantiaInput3"
                                                        name="tempoGarantia3[]" placeholder="Digite o tempo de garantia">
                                                </div>

                                                <!-- Link da Proposta -->
                                                <div class="col-md-4 mb-3">
                                                    <label>Link da 3ª Proposta</label>
                                                    <input type="text" class="form-control mt-2" id="linkProposta3"
                                                        name="linkProposta3[]" placeholder="Link da Proposta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            {{-- <label>Categoria do Material</label> --}}
                                            <h5>Materiais</h5>
                                        </div>
                                        <div class="col-md-3">
                                            {{-- <label>Nome do Material</label> --}}
                                        </div>
                                        <div class="col-md-2">
                                            {{-- <label>Unidade de Medida</label> --}}
                                        </div>
                                        <div class="col-md-1">
                                            {{-- <label>Quantidade</label> --}}
                                        </div>
                                        <div class="col-md-1">
                                            <label>1ª Empresa</label>
                                        </div>
                                        <div class="col-md-1">
                                            <label>2ª Empresa</label>
                                        </div>
                                        <div class="col-md-1">
                                            <label>3ª Empresa</label>
                                        </div>
                                    </div>
                                    {{-- card materiais por empresa --}}
                                    @foreach ($materiais as $index => $material)
                                        <div class="card" id="card-material" style="margin-bottom: 10px">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="row material-item flex-grow-1">
                                                    <div class="col-md-2">
                                                        <label>Categoria do Material</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoCategoria->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Nome do Material</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->nome ?? 'Não especificado' }}" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Unid. Medida</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoUnidadeMedida->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Quantidade</label>
                                                        <input type="text" class="form-control" name="quantidadePorEmpresa[]"
                                                            value="{{ $material->quantidade ?? 'Não especificado' }}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valor1[]" placeholder="Digite o valor da proposta">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valor2[]" placeholder="Digite o valor da proposta">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valor3[]" placeholder="Digite o valor da proposta">
                                                    </div>
                                                </div>
                                                <!-- Botões de Minimizar e Fechar -->
                                                <div class="card-actions position-absolute" style="top: 5px; right: 5px;">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary toggle-card-content"
                                                        data-bs-toggle="tooltip" title="Minimizar/Maximizar">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-danger open-delete-modal"
                                                        data-bs-toggle="modal" data-bs-target="#modalExcluirMaterial"
                                                        data-material-id="{{ $material->id }}"
                                                        data-material-name="{{ $material->nome }}"
                                                        data-bs-toggle="tooltip" title="Excluir">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body d-none">
                                                <div class="row material-item">
                                                    <div class="col-md">
                                                        <label>Marca</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoMarca->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Tamanho</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoTamanho->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Cor</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoCor->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Fase Etária</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoFaseEtaria->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Sexo</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $material->tipoSexo->nome ?? 'Não especificado' }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="botões">
            <a href="javascript:history.back()" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
        </div>
        </div>
    </form>
    <!-- Modal Incluir Material -->
    <div class="modal fade" id="modalIncluirMaterial" tabindex="-1" aria-labelledby="modalIncluirMaterialLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="form-horizontal" method="POST"
                action="{{ url('/incluir-material-solicitacao/' . $idSolicitacao) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="background-color:lightblue;">
                        <h5 class="modal-title" id="modalIncluirMaterialLabel">
                            Inclusão de Material
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content-incluir-material">
                        <div class="row material-item">
                            <div class="col-md">
                                <label>Categoria do Material</label>
                                <select class="form-select  select2" id="categoriaMaterial"
                                    style="border: 1px solid #999999; padding: 5px;" name="categoriaMaterial">
                                    <option value="" disabled selected>Selecione...
                                    </option>
                                    @foreach ($buscaCategoria as $buscaCategorias)
                                        <option value="{{ $buscaCategorias->id }}">
                                            {{ $buscaCategorias->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">
                                <label>Nome do Material</label>
                                <input type="text" class="form-control" name="nomeMaterial"
                                    placeholder="Digite o Nome do Material">
                            </div>
                            <div class="col-md-2">
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
                            <div class="col-md-2">
                                <label>Quantidade</label>
                                <input type="number" class="form-control" name="quantidadeMaterial">
                            </div>
                        </div>
                        <div class="row material-item" style="margin-top: 20px">
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
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- FIM da Modal Incluir Material -->
    <!-- Modal Excluir Material -->
    <div class="modal fade" id="modalExcluirMaterial" tabindex="-1" aria-labelledby="modalExcluirMaterialLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="form-horizontal" method="post" action="{{ url('/excluir-material-solicitacao') }}">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#DC4C64;">
                        <h5 class="modal-title" id="modalExcluirMaterialLabel">Exclusão de Material</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content-excluir-material">
                        <!-- Conteúdo dinâmico será inserido aqui -->
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- FIM da Modal Excluir Material -->
    <script>
        // Selecione todos os campos com a classe 'proposta'
        document.querySelectorAll('.valor-proposta').forEach(function(input) {
            input.addEventListener('input', function(event) {
                let value = event.target.value.replace(/\D/g, ''); // Remove tudo o que não for número
                if (value) {
                    value = (parseInt(value) / 100).toFixed(2); // Converte para valor decimal
                    value = value.replace('.', ','); // Substitui ponto por vírgula
                    event.target.value = 'R$ ' + value; // Adiciona o "R$" antes do valor
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const btnPorEmpresa = document.getElementById('btnPorEmpresa');
            const btnPorMaterial = document.getElementById('btnPorMaterial');
            const listaMateriais = document.getElementById('listaMateriais');
            const listaEmpresa = document.getElementById('listaEmpresa');
            const btnAddMaterial = document.getElementById('addMaterial');
            const templateMaterial = document.getElementById('templateMaterial');

            let materialAdicionado = false;

            function toggleList(activeButton) {
                if (activeButton === 'empresa') {
                    btnPorEmpresa.classList.add('btn-primary');
                    btnPorEmpresa.classList.remove('btn-secondary');
                    btnPorMaterial.classList.add('btn-secondary');
                    btnPorMaterial.classList.remove('btn-primary');

                    btnPorEmpresa.setAttribute('aria-selected', 'true');
                    btnPorMaterial.setAttribute('aria-selected', 'false');

                    listaMateriais.style.display = 'none';
                    listaEmpresa.style.display = 'block';
                } else if (activeButton === 'material') {
                    btnPorMaterial.classList.add('btn-primary');
                    btnPorMaterial.classList.remove('btn-secondary');
                    btnPorEmpresa.classList.add('btn-secondary');
                    btnPorEmpresa.classList.remove('btn-primary');

                    btnPorMaterial.setAttribute('aria-selected', 'true');
                    btnPorEmpresa.setAttribute('aria-selected', 'false');

                    listaMateriais.style.display = 'block';
                    listaEmpresa.style.display = 'none';

                    if (!materialAdicionado) {
                        addMaterial();
                        materialAdicionado = true;
                    }
                }

                // Salva o estado no localStorage
                localStorage.setItem('activeButton', activeButton);
            }

            function addMaterial() {
                // Implementação do material dinâmico aqui, se necessário
                console.log("Material adicionado dinamicamente.");
            }

            // Restaura o estado do botão ativo do localStorage
            const savedState = localStorage.getItem('activeButton') || 'empresa';
            toggleList(savedState);

            btnPorEmpresa.addEventListener('click', () => toggleList('empresa'));
            btnPorMaterial.addEventListener('click', () => toggleList('material'));
        });


        // Minimizar Card
        document.querySelectorAll('.toggle-card-content').forEach(button => {
            button.addEventListener('click', function() {
                const cardBody = this.closest('.card').querySelector('.card-body');
                cardBody.classList.toggle('d-none');

                // Alterna o ícone entre '-' e '+'
                const icon = this.querySelector('i');
                if (cardBody.classList.contains('d-none')) {
                    icon.classList.remove('bi-dash');
                    icon.classList.add('bi-plus');
                } else {
                    icon.classList.remove('bi-plus');
                    icon.classList.add('bi-dash');
                }
            });
        });

        //Fechar Card
        document.querySelectorAll('.open-delete-modal').forEach(button => {
            button.addEventListener('click', function() {
                const materialId = this.getAttribute('data-material-id');
                const materialName = this.getAttribute('data-material-name');
                const modalBody = document.getElementById('modal-body-content-excluir-material');

                // Define o conteúdo dinâmico
                modalBody.innerHTML = `
            <p>Tem certeza de que deseja excluir o material <strong>${materialName}</strong>?</p>
            <input type="hidden" name="material_id" value="${materialId}">
        `;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Função genérica para carregar opções via AJAX
            function carregarOpcoes(url, targetSelect, placeholder = "Selecione...") {
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const select = $(targetSelect);
                        select.empty(); // Limpa as opções existentes
                        if (data.length > 0) {
                            select.append(`<option value="" disabled selected>${placeholder}</option>`);
                            data.forEach(item => {
                                select.append(`<option value="${item.id}">${item.nome}</option>`);
                            });
                        } else {
                            select.append(`<option value="" disabled selected>Não Possui</option>`);
                        }
                    })
                    .catch(error => console.error("Erro ao carregar opções:", error));
            }

            // Filtro de Marca baseado na Categoria
            $('#categoriaMaterial').on('change', function() {
                const categoriaId = this.value;
                if (categoriaId) {
                    carregarOpcoes(`/marcas/${categoriaId}`, '#marcaMaterial');
                }
            });

            // Filtro de Tamanho baseado na Categoria
            $('#categoriaMaterial').on('change', function() {
                const categoriaId = this.value;
                if (categoriaId) {
                    carregarOpcoes(`/tamanhos/${categoriaId}`, '#tamanhoMaterial');
                }
            });

            // Filtro de Cor baseado na Categoria
            $('#categoriaMaterial').on('change', function() {
                const categoriaId = this.value;
                if (categoriaId) {
                    carregarOpcoes(`/cores/${categoriaId}`, '#corMaterial');
                }
            });

            // Filtro de Fase Etária baseado na Categoria
            $('#categoriaMaterial').on('change', function() {
                const categoriaId = this.value;
                if (categoriaId) {
                    carregarOpcoes(`/fases/${categoriaId}`, '#faseEtariaMaterial');
                }
            });
        });
    </script>
@endsection
