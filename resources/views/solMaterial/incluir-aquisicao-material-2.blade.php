@extends('layouts.app')

@section('title')
    Gerenciar Solicitação de Material
@endsection

@section('content')
    <form method="POST" action="/salvar-proposta-material/{{ $idSolicitacao }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="activeButton" id="activeButton"
            value="{{ $solicitacao->tipo_sol_material == 1 ? 'empresa' : 'material' }}">
        <div class="container-fluid">
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="col-12" style="color: #355089">
                                    Gerenciar Solicitação de Material
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação da Solicitação</h5>
                            <hr>
                            <div class="row">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-3 col-sm-12">
                                        <label>Nome do Solicitante</label>
                                        <br>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitacao->modelPessoa->nome_completo ?? 'Não especificado' }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label>Selecione seu Setor</label>
                                        <br>
                                        <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                            id="idSetor" name="idSetorSolicitacao" required>
                                            <option value="{{ $solicitacao->setor->id ?? '' }}" selected>
                                                {{ $solicitacao->setor->sigla ?? 'Não especificado' }} -
                                                {{ $solicitacao->setor->nome ?? 'Não especificado' }}</option>
                                            @foreach ($buscaSetor as $buscaSetors)
                                                <option value="{{ $buscaSetors->id }}">
                                                    {{ $buscaSetors->sigla }} - {{ $buscaSetors->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label>Motivo</label>
                                    <br>
                                    <input type="text" class="form-control" name="motivoSolicitacao"
                                        placeholder="Digite o motivo da solicitação"
                                        style="background-color: white; border-color: gray;"
                                        value="{{ $solicitacao->motivo ?? '' }}" required>
                                </div>
                            </div>
                            <br>
                            <h5>Selecione o Tipo de Solicitação</h5>
                            <hr>
                            <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                                <!-- Botões Por Material e Por Empresa no centro -->
                                <div style="flex-grow: 1; display: flex; justify-content: center;">
                                    <div class="btn-group" role="group" aria-label="Tipo de Solicitação">
                                        <button type="button" class="btn btn-primary" id="btnPorMaterial"
                                            aria-selected="true" name="botaoPorMaterial">
                                            Por Material
                                        </button>
                                        <button type="button" class="btn btn-secondary" id="btnPorEmpresa"
                                            aria-selected="false" name="botaoPorEmpresa">
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
                                {{-- card por material --}}
                                <div class="col-12 mt-3" id="listaMateriais" style="display: none;">
                                    @foreach ($materiais as $index => $material)
                                        <div class="card" id="card-material" style="margin-bottom: 10px">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="row material-item flex-grow-1">
                                                    <div class="col-md-4">
                                                        <label>Categoria do Material</label>
                                                        <select class="form-select categoria-por-material select2"
                                                            name="categoriaPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoCategoria->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoCategoria->nome ?? 'Não especificado' }}
                                                            </option>
                                                            @foreach ($buscaCategoria as $buscaCategorias)
                                                                <option value="{{ $buscaCategorias->id }}">
                                                                    {{ $buscaCategorias->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nome do Material</label>
                                                        <select class="form-select nome-por-material select2"
                                                            name="nomePorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option
                                                                value="{{ $material->tipoItemCatalogoMaterial->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoItemCatalogoMaterial->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Unid. Medida</label>
                                                        <select class="form-select  select2"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="UnidadeMedidaPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoUnidadeMedida->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoUnidadeMedida->nome ?? 'Não especificado' }}
                                                            </option>
                                                            @foreach ($buscaUnidadeMedida as $buscaUnidadeMedidas)
                                                                <option value="{{ $buscaUnidadeMedidas->id }}">
                                                                    {{ $buscaUnidadeMedidas->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Quantidade</label>
                                                        <input type="text" class="form-control"
                                                            name="quantidadePorMaterial1[{{ $index }}]"
                                                            style="background-color: white; border-color: gray;"
                                                            data-index="{{ $index }}"
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
                                                        <select class="form-select marca-por-material select2"
                                                            name="marcaPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoMarca->id ?? '' }}" selected>
                                                                {{ $material->tipoMarca->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Tamanho</label>
                                                        <select class="form-select tamanho-por-material select2"
                                                            name="tamanhoPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoTamanho->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoTamanho->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Cor</label>
                                                        <select class="form-select cor-por-material select2"
                                                            name="corPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoCor->id ?? '' }}" selected>
                                                                {{ $material->tipoCor->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Fase Etária</label>
                                                        <select class="form-select fase-etaria-por-material select2"
                                                            name="faseEtariaPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoFaseEtaria->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoFaseEtaria->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Sexo</label>
                                                        <select class="form-select sexo-por-material select2"
                                                            name="sexoPorMaterial[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoSexo->id ?? '' }}" selected>
                                                                {{ $material->tipoSexo->nome ?? 'Não especificado' }}
                                                            </option>
                                                            @foreach ($buscaSexo as $buscaSexos)
                                                                <option value="{{ $buscaSexos->id }}">
                                                                    {{ $buscaSexos->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- Contador --}}
                                                @php
                                                    $requiredMaterialsProposals = 3;
                                                    $counterMaterials = 1;
                                                    $actualMaterialsProposals = count($material->documentoMaterial);
                                                    $missingMaterialsProposals = max(
                                                        0,
                                                        $requiredMaterialsProposals - $actualMaterialsProposals,
                                                    );
                                                @endphp
                                                {{-- Propostas Preenchidas por material (3) --}}
                                                @if ($material->documentoMaterial->isNotEmpty())
                                                    @foreach ($material->documentoMaterial as $documentoMaterials)
                                                        <input type="hidden" name="numMat[]"
                                                            value="{{ $material->id }}">
                                                        <div class="card mt-3">
                                                            <div class="card-header">
                                                                <h5 class="card-title mb-0">
                                                                    @if ($counterMaterials == 1)
                                                                        Proposta Preferida
                                                                    @else
                                                                        {{ $counterMaterials }}ª Proposta
                                                                    @endif
                                                                </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Número da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Número da Proposta Principal
                                                                            @else
                                                                                Número da {{ $counterMaterials }}ª Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="numero1[]"
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite o Número da proposta"
                                                                            value="{{ $documentoMaterials->numero }}"
                                                                            data-index="{{ $index }}">
                                                                    </div>
                                                                    <!-- Nome da Empresa -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Nome da Empresa Principal
                                                                            @else
                                                                                Nome da {{ $counterMaterials }}ª Empresa
                                                                            @endif
                                                                        </label>
                                                                        <select class="form-select select2"
                                                                            name="razaoSocial1[]"
                                                                            data-index="{{ $index }}"
                                                                            style="border: 1px solid #999999; padding: 5px;">
                                                                            <option value="{{ $material->id_empresa }}">
                                                                                {{ $documentoMaterials->empresa->razaosocial ?? 'Não especificado' }}
                                                                                -
                                                                                {{ $documentoMaterials->empresa->nomefantasia ?? 'Não especificado' }}
                                                                            </option>
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
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Valor da Proposta Principal
                                                                            @else
                                                                                Valor da {{ $counterMaterials }}ª Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control valor valor-proposta"
                                                                            data-index="{{ $index }}"
                                                                            name="valor1[]"
                                                                            value="{{ $documentoMaterials->valor }}"
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite o valor da proposta">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <!-- Data da Criação da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Data da Criação da
                                                                                Proposta Principal
                                                                            @else
                                                                                Data da Criação da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="date" class="form-control"
                                                                            name="dt_inicial1[]"
                                                                            data-index="{{ $index }}"
                                                                            value="{{ $documentoMaterials->dt_doc }}"
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite a data da proposta">
                                                                    </div>

                                                                    <!-- Data Limite da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Data Limite da Proposta Principal
                                                                            @else
                                                                                Data Limite da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="date" class="form-control"
                                                                            name="dt_final1[]"
                                                                            data-index="{{ $index }}"
                                                                            value="{{ $documentoMaterials->dt_validade }}"
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite a data final do prazo da proposta">
                                                                    </div>

                                                                    <!-- Arquivo da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>Arquivo da Proposta Principal</label>
                                                                        <input type="file" class="form-control"
                                                                            data-index="{{ $index }}"
                                                                            style="background-color: white; border-color: gray;"
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
                                                                            value="{{ $documentoMaterials->tempo_garantia_dias }}"
                                                                            style="background-color: white; border-color: gray;"
                                                                            id="tempoGarantiaInput"
                                                                            name="tempoGarantia1[]"
                                                                            data-index="{{ $index }}"
                                                                            placeholder="Digite o tempo de garantia">
                                                                    </div>

                                                                    <!-- Link da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Link da Proposta Principal
                                                                            @else
                                                                                Link da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $documentoMaterials->link_proposta }}"
                                                                            style="background-color: white; border-color: gray;"
                                                                            id="linkProposta1" name="linkProposta1[]"
                                                                            data-index="{{ $index }}"
                                                                            placeholder="Link da Proposta">
                                                                    </div>

                                                                    <!-- Arquivo atual da Proposta -->
                                                                    <div class="col-md-4 mb-3 row">
                                                                        <label for="arquivo">Arquivo Salvo</label>
                                                                        @if ($documentoMaterials->end_arquivo)
                                                                            <a href="{{ Storage::url($documentoMaterials->end_arquivo) }}"
                                                                                target="_blank" class="btn btn-primary">
                                                                                Ver Arquivo
                                                                            </a>
                                                                        @else
                                                                            <a class="btn btn-secondary" disabled>Nenhum
                                                                                arquivo
                                                                                disponível.</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $counterMaterials++; @endphp
                                                    @endforeach
                                                @else
                                                    {{-- Propostas vazias para preencher as que faltam na por material --}}
                                                    @for ($i = 0; $i < $missingMaterialsProposals; $i++)
                                                        <input type="hidden" name="numMat[]"
                                                            value="{{ $material->id }}">
                                                        <div class="card mt-3">
                                                            <div class="card-header">
                                                                <h5 class="card-title mb-0">
                                                                    @if ($counterMaterials == 1)
                                                                        Proposta Preferida
                                                                    @else
                                                                        {{ $counterMaterials }}ª Proposta
                                                                    @endif
                                                                </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Número da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Número da Proposta Principal
                                                                            @else
                                                                                Número da {{ $counterMaterials }}ª Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="numero1[]"
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite o Número da proposta"
                                                                            value=""
                                                                            data-index="{{ $index }}">
                                                                    </div>
                                                                    <!-- Nome da Empresa -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Nome da Empresa Principal
                                                                            @else
                                                                                Nome da {{ $counterMaterials }}ª Empresa
                                                                            @endif
                                                                        </label>
                                                                        <select class="form-select select2"
                                                                            name="razaoSocial1[]"
                                                                            style="border: 1px solid #999999; padding: 5px;">
                                                                            <option value=""
                                                                                data-index="{{ $index }}">
                                                                            </option>
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
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Valor da Proposta Principal
                                                                            @else
                                                                                Valor da {{ $counterMaterials }}ª Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control valor valor-proposta"
                                                                            name="valor1[]" value=""
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite o valor da proposta"
                                                                            data-index="{{ $index }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <!-- Data da Criação da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Data da Criação da
                                                                                Proposta Principal
                                                                            @else
                                                                                Data da Criação da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="date" class="form-control"
                                                                            name="dt_inicial1[]" value=""
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite a data da proposta"
                                                                            data-index="{{ $index }}">
                                                                    </div>

                                                                    <!-- Data Limite da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Data Limite da Proposta Principal
                                                                            @else
                                                                                Data Limite da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="date" class="form-control"
                                                                            name="dt_final1[]" value=""
                                                                            style="background-color: white; border-color: gray;"
                                                                            placeholder="Digite a data final do prazo da proposta"
                                                                            data-index="{{ $index }}">
                                                                    </div>

                                                                    <!-- Arquivo da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Arquivo da Proposta Principal
                                                                            @else
                                                                                Arquivo da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="file" class="form-control"
                                                                            style="background-color: white; border-color: gray;"
                                                                            id="uploadProposta1" name="arquivoProposta1[]"
                                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg"
                                                                            data-index="{{ $index }}">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <!-- Tempo de Garantia -->
                                                                    <div id="tempoGarantia" class="col-md-4 mb-3">
                                                                        <label>Tempo de Garantia (em
                                                                            dias)</label>
                                                                        <input type="number" class="form-control"
                                                                            value=""
                                                                            style="background-color: white; border-color: gray;"
                                                                            id="tempoGarantiaInput"
                                                                            name="tempoGarantia1[]"
                                                                            placeholder="Digite o tempo de garantia"
                                                                            data-index="{{ $index }}">
                                                                    </div>

                                                                    <!-- Link da Proposta -->
                                                                    <div class="col-md-4 mb-3">
                                                                        <label>
                                                                            @if ($counterMaterials == 1)
                                                                                Link da Proposta Principal
                                                                            @else
                                                                                Link da {{ $counterMaterials }}ª
                                                                                Proposta
                                                                            @endif
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            value=""
                                                                            style="background-color: white; border-color: gray;"
                                                                            id="linkProposta1" name="linkProposta1[]"
                                                                            placeholder="Link da Proposta"
                                                                            data-index="{{ $index }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $counterMaterials++; @endphp
                                                    @endfor
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12 mt-3" id="listaEmpresa" style="display: block;">
                                    {{-- Contador --}}
                                    @php
                                        $requiredProposals = 3;
                                        $actualProposals = count($documentos);
                                        $missingProposals = $requiredProposals - $actualProposals;
                                        $counter = 1;
                                    @endphp
                                    {{-- Propostas Preenchidas por empresa (3) --}}
                                    @if ($documentos->isNotEmpty())
                                        @foreach ($documentos as $documento)
                                            <input type="hidden" name="docEmp[]" value="{{ $documento->id }}">
                                            {{-- card proposta por empresa --}}
                                            <div class="card mt-3">
                                                <div class="card-header">
                                                    {{-- Nome da Proposta --}}
                                                    <h5 class="card-title mb-0">
                                                        @if ($counter == 1)
                                                            Proposta Preferida
                                                        @else
                                                            Proposta {{ $counter }}
                                                        @endif
                                                    </h5>
                                                    <!-- Botões de Minimizar -->
                                                    <div class="card-actions position-absolute"
                                                        style="top: 5px; right: 5px;">
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
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Número da Proposta Principal
                                                                @else
                                                                    Número da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="numeroPorEmpresa[{{ $counter }}]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o Número da proposta"
                                                                value="{{ $documento->numero }}">
                                                        </div>
                                                        <!-- Nome da Empresa -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Nome da Empresa Principal
                                                                @else
                                                                    Nome da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <select class="form-select select2"
                                                                name="razaoSocialPorEmpresa[{{ $counter }}]"
                                                                style="border: 1px solid #999999; padding: 5px;">
                                                                <option value="{{ $documento->empresa->id }}" selected>
                                                                    {{ $documento->empresa->razaosocial ?? 'Não especificado' }}
                                                                    -
                                                                    {{ $documento->empresa->nomefantasia ?? 'Não especificado' }}
                                                                </option>
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
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Valor Total da Proposta Principal
                                                                @else
                                                                    Valor Total da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text"
                                                                class="form-control valor valor-proposta"
                                                                name="valorPorEmpresa[{{ $counter }}]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o valor da proposta"
                                                                value="{{ $documento->valor }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Data da Criação da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Data da Criação da
                                                                    Proposta Principal
                                                                @else
                                                                    Data da Criação da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                style="background-color: white; border-color: gray;"
                                                                name="dt_inicialPorEmpresa[{{ $counter }}]"
                                                                placeholder="Digite a data da proposta"
                                                                value="{{ $documento->dt_doc }}">
                                                        </div>

                                                        <!-- Data Limite da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Data Limite da Proposta Principal
                                                                @else
                                                                    Data Limite da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                name="dt_finalPorEmpresa[{{ $counter }}]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite a data final do prazo da proposta"
                                                                value="{{ $documento->dt_validade }}">
                                                        </div>

                                                        <!-- Arquivo da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Inserir Arquivo na Proposta Principal
                                                                @else
                                                                    Inserir Arquivo na Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="file" class="form-control"
                                                                id="uploadProposta{{ $counter }}"
                                                                name="arquivoPropostaPorEmpresa[{{ $counter }}]"
                                                                style="background-color: white; border-color: gray;"
                                                                accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Tempo de Garantia -->
                                                        <div id="tempoGarantia" class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Tempo de Garantia (em
                                                                    dias) da Proposta Principal
                                                                @else
                                                                    Tempo de Garantia (em
                                                                    dias) da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="number" class="form-control"
                                                                id="tempoGarantiaInput"
                                                                name="tempoGarantiaPorEmpresa[{{ $counter }}]"
                                                                data-index="{{ $index }}"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o tempo de garantia"
                                                                value="{{ $documento->tempo_garantia_dias }}">
                                                        </div>

                                                        <!-- Link da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Link da Proposta Principal
                                                                @else
                                                                    Link da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text" class="form-control" id="linkProposta1"
                                                                name="linkPropostaPorEmpresa[{{ $counter }}]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Link da Proposta"
                                                                data-index="{{ $index }}"
                                                                value="{{ $documento->link_proposta }}">
                                                        </div>

                                                        <!-- Arquivo atual da Proposta -->
                                                        <div class="col-md-4 mb-3 row">
                                                            <label for="arquivo">Arquivo Salvo</label>
                                                            @if ($documento->end_arquivo)
                                                                <a href="{{ Storage::url($documento->end_arquivo) }}"
                                                                    target="_blank" class="btn btn-primary">
                                                                    Ver Arquivo
                                                                </a>
                                                            @else
                                                                <a class="btn btn-secondary" disabled>Nenhum arquivo
                                                                    disponível.</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++; @endphp
                                        @endforeach
                                    @else
                                        {{-- Propostas vazias para preencher as que faltam na por empresa --}}
                                        @for ($i = 0; $i < $missingProposals; $i++)
                                            <div class="card mt-3">
                                                <div class="card-header">
                                                    {{-- Nome da Proposta --}}
                                                    <h5 class="card-title mb-0">
                                                        @if ($counter == 1)
                                                            Proposta Preferida
                                                        @else
                                                            Proposta {{ $counter }}
                                                        @endif
                                                    </h5>
                                                    <!-- Botões de Minimizar e Fechar -->
                                                    <div class="card-actions position-absolute"
                                                        style="top: 5px; right: 5px;">
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
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Número da Proposta Principal
                                                                @else
                                                                    Número da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="numeroPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o Número da proposta" value="">
                                                        </div>
                                                        <!-- Nome da Empresa -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Nome da Empresa Principal
                                                                @else
                                                                    Nome da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <select class="form-select select2"
                                                                name="razaoSocialPorEmpresa[]"
                                                                style="border: 1px solid #999999; padding: 5px;">
                                                                <option value="" selected> </option>
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
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Valor Total da Proposta Principal
                                                                @else
                                                                    Valor Total da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text"
                                                                class="form-control valor valor-proposta"
                                                                name="valorPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o valor da proposta" value="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Data da Criação da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Data da Criação da
                                                                    Proposta Principal
                                                                @else
                                                                    Data da Criação da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                style="background-color: white; border-color: gray;"
                                                                name="dt_inicialPorEmpresa[]"
                                                                placeholder="Digite a data da proposta" value="">
                                                        </div>

                                                        <!-- Data Limite da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Data Limite da Proposta Principal
                                                                @else
                                                                    Data Limite da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="date" class="form-control"
                                                                name="dt_finalPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite a data final do prazo da proposta"
                                                                value="">
                                                        </div>

                                                        <!-- Arquivo da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Inserir Arquivo na Proposta Principal
                                                                @else
                                                                    Inserir Arquivo na Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="file" class="form-control"
                                                                id="uploadProposta1" name="arquivoPropostaPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" value="">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Tempo de Garantia -->
                                                        <div id="tempoGarantia" class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Tempo de Garantia (em
                                                                    dias) da Proposta Principal
                                                                @else
                                                                    Tempo de Garantia (em
                                                                    dias) da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="number" class="form-control"
                                                                id="tempoGarantiaInput" name="tempoGarantiaPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Digite o tempo de garantia" value="">
                                                        </div>

                                                        <!-- Link da Proposta -->
                                                        <div class="col-md-4 mb-3">
                                                            <label>
                                                                @if ($counter == 1)
                                                                    Link da Proposta Principal
                                                                @else
                                                                    Link da Proposta {{ $counter }}
                                                                @endif
                                                            </label>
                                                            <input type="text" class="form-control" id="linkProposta1"
                                                                name="linkPropostaPorEmpresa[]"
                                                                style="background-color: white; border-color: gray;"
                                                                placeholder="Link da Proposta" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++; @endphp
                                        @endfor
                                    @endif
                                    <br>
                                    {{-- Nomes em cima da tabela --}}
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
                                    {{-- card por empresa --}}
                                    @foreach ($materiais as $index => $material)
                                        <div class="card" id="card-material" style="margin-bottom: 10px">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="row material-item flex-grow-1">
                                                    <div class="col-md-2">
                                                        <label>Categoria do Material</label>
                                                        <select class="form-select categoria-por-empresa select2"
                                                            name="categoriaPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoCategoria->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoCategoria->nome ?? 'Não especificado' }}
                                                            </option>
                                                            @foreach ($buscaCategoria as $buscaCategorias)
                                                                <option value="{{ $buscaCategorias->id }}">
                                                                    {{ $buscaCategorias->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Nome do Material</label>
                                                        <select class="form-select nome-por-empresa select2"
                                                            name="nomePorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option
                                                                value="{{ $material->tipoItemCatalogoMaterial->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoItemCatalogoMaterial->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Unid. Medida</label>
                                                        <select class="form-select  select2"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="UnidadeMedidaPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoUnidadeMedida->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoUnidadeMedida->nome ?? 'Não especificado' }}
                                                            </option>
                                                            @foreach ($buscaUnidadeMedida as $buscaUnidadeMedidas)
                                                                <option value="{{ $buscaUnidadeMedidas->id }}">
                                                                    {{ $buscaUnidadeMedidas->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Quantidade</label>
                                                        <input type="text" class="form-control"
                                                            style="background-color: white; border-color: gray;"
                                                            name="quantidadePorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}"
                                                            value="{{ $material->quantidade ?? 'Não especificado' }}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valorUnitarioEmpresa1[{{ $index }}]"
                                                            style="background-color: white; border-color: gray;"
                                                            placeholder="Digite o valor da proposta"
                                                            data-index="{{ $index }}"
                                                            value="{{ $material->valor1 }}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valorUnitarioEmpresa2[{{ $index }}]"
                                                            style="background-color: white; border-color: gray;"
                                                            placeholder="Digite o valor da proposta"
                                                            data-index="{{ $index }}"
                                                            value="{{ $material->valor2 }}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label>Valor Unitário</label>
                                                        <input type="text" class="form-control valor valor-proposta"
                                                            name="valorUnitarioEmpresa3[{{ $index }}]"
                                                            style="background-color: white; border-color: gray;"
                                                            placeholder="Digite o valor da proposta"
                                                            data-index="{{ $index }}"
                                                            value="{{ $material->valor3 }}">
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
                                                        <select class="form-select marca-por-empresa select2"
                                                            name="marcaPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoMarca->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoMarca->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Tamanho</label>
                                                        <select class="form-select tamanho-por-empresa select2"
                                                            name="tamanhoPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoTamanho->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoTamanho->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Cor</label>
                                                        <select class="form-select cor-por-empresa select2"
                                                            name="corPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoCor->id ?? '' }}" selected>
                                                                {{ $material->tipoCor->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Fase Etária</label>
                                                        <select class="form-select fase-etaria-por-empresa select2"
                                                            name="faseEtariaPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoFaseEtaria->id ?? '' }}"
                                                                selected>
                                                                {{ $material->tipoFaseEtaria->nome ?? 'Não especificado' }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label>Sexo</label>
                                                        <select class="form-select sexo-por-empresa select2"
                                                            name="sexoPorEmpresa[{{ $index }}]"
                                                            data-index="{{ $index }}">
                                                            <option value="{{ $material->tipoSexo->id ?? '' }}" selected>
                                                                {{ $material->tipoSexo->nome ?? 'Não especificado' }}
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
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Botões Confirmar e Cancelar --}}
        <div class="botões">
            <a href="/gerenciar-aquisicao-material" class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <button type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
            </button>
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
                                <select class="form-select js-nome-material select2" id="nomeMaterial"
                                    style="border: 1px solid #999999; padding: 5px;" name="nomeMaterial">
                                    <option value="" disabled selected>Selecione...
                                    </option>
                                </select>
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
    {{-- Style do Select2 --}}
    <style>
        .select2-container--bootstrap-5 .select2-selection {
            background-color: white !important;
            border-color: gray !important;
        }
    </style>

    {{-- Script dos botao de alternar e adicionar --}}
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

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.valor-proposta').forEach(function(input) {
                let value = input.value.replace(/\D/g, ''); // Remove tudo o que não for número
                if (value) {
                    value = (parseInt(value) / 100).toFixed(2).replace('.',
                        ','); // Converte para valor decimal
                    input.value = 'R$ ' + value;
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Captura os elementos do DOM
            const btnPorEmpresa = document.getElementById('btnPorEmpresa');
            const btnPorMaterial = document.getElementById('btnPorMaterial');
            const listaEmpresa = document.getElementById('listaEmpresa');
            const listaMateriais = document.getElementById('listaMateriais');
            const inputActiveButton = document.getElementById('activeButton');

            let materialAdicionado = false;

            // Obtém o estado salvo ou define 'empresa' como padrão
            let activeButton = document.getElementById('activeButton').value || localStorage.getItem(
                'activeButton') || 'empresa';
            inputActiveButton.value = activeButton;

            function toggleList(type) {
                activeButton = type;
                inputActiveButton.value = type;
                localStorage.setItem('activeButton', type);

                if (type === 'empresa') {
                    btnPorEmpresa.classList.add('btn-primary');
                    btnPorEmpresa.classList.remove('btn-secondary');
                    btnPorMaterial.classList.add('btn-secondary');
                    btnPorMaterial.classList.remove('btn-primary');

                    btnPorEmpresa.setAttribute('aria-selected', 'true');
                    btnPorMaterial.setAttribute('aria-selected', 'false');

                    listaMateriais.style.display = 'none';
                    listaEmpresa.style.display = 'block';

                    toggleRequired(listaMateriais, false);
                    toggleRequired(listaEmpresa, true);
                } else if (type === 'material') {
                    btnPorMaterial.classList.add('btn-primary');
                    btnPorMaterial.classList.remove('btn-secondary');
                    btnPorEmpresa.classList.add('btn-secondary');
                    btnPorEmpresa.classList.remove('btn-primary');

                    btnPorMaterial.setAttribute('aria-selected', 'true');
                    btnPorEmpresa.setAttribute('aria-selected', 'false');

                    listaMateriais.style.display = 'block';
                    listaEmpresa.style.display = 'none';

                    toggleRequired(listaMateriais, true);
                    toggleRequired(listaEmpresa, false);

                    if (!materialAdicionado) {
                        addMaterial();
                        materialAdicionado = true;
                    }
                }
            }

            function toggleRequired(container, isRequired) {
                const inputs = container.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    if (input.type !== 'file') {
                        if (isRequired) {
                            input.setAttribute('required', 'required');
                        } else {
                            input.removeAttribute('required');
                        }
                    }
                });
            }

            function addMaterial() {
                console.log("Material adicionado dinamicamente.");
            }

            // Inicializa a interface com o estado salvo
            toggleList(activeButton);

            // Adiciona eventos aos botões
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
    {{-- preencher select da modal --}}
    <script>
        $(document).ready(function() {
            // Função genérica para carregar opções via AJAX
            function carregarOpcoes(url, targetSelect, placeholder = "Selecione...") {
                fetch(url)
                    .then((response) => response.json())
                    .then((data) => {
                        const select = $(targetSelect);
                        select.empty(); // Limpa as opções existentes
                        if (data.length > 0) {
                            select.append(`<option value="" disabled selected>${placeholder}</option>`);
                            data.forEach((item) => {
                                select.append(`<option value="${item.id}">${item.nome}</option>`);
                            });
                        } else {
                            select.append(`<option value="" selected>Não Possui</option>`);
                        }
                    })
                    .catch((error) => console.error("Erro ao carregar opções:", error));
            }

            // Filtro dinâmico com base na categoria
            $('#categoriaMaterial').on('change', function() {
                const categoriaId = this.value;
                if (categoriaId) {
                    carregarOpcoes(`/nome/${categoriaId}`, '#nomeMaterial');
                    carregarOpcoes(`/marcas/${categoriaId}`, '#marcaMaterial');
                    carregarOpcoes(`/tamanhos/${categoriaId}`, '#tamanhoMaterial');
                    carregarOpcoes(`/cores/${categoriaId}`, '#corMaterial');
                    carregarOpcoes(`/fases/${categoriaId}`, '#faseEtariaMaterial');
                }
            });

            // Aplicar evento de mudança a todas as categorias por Material
            $(document).on('change', '.categoria-por-material', function() {
                let categoriaId = $(this).val();
                let index = $(this).data('index'); // Obtém o índice do item

                if (categoriaId) {
                    carregarOpcoes(`/nome/${categoriaId}`, `select[name="nomePorMaterial[${index}]"]`);
                    carregarOpcoes(`/marcas/${categoriaId}`, `select[name="marcaPorMaterial[${index}]"]`);
                    carregarOpcoes(`/tamanhos/${categoriaId}`,
                        `select[name="tamanhoPorMaterial[${index}]"]`);
                    carregarOpcoes(`/cores/${categoriaId}`, `select[name="corPorMaterial[${index}]"]`);
                    carregarOpcoes(`/fases/${categoriaId}`,
                        `select[name="faseEtariaPorMaterial[${index}]"]`);
                }
            });

            // Aplicar evento de mudança a todas as categorias por Empresa
            $(document).on('change', '.categoria-por-empresa', function() {
                let categoriaId = $(this).val();
                let index = $(this).data('index'); // Obtém o índice do item

                if (categoriaId) {
                    carregarOpcoes(`/nome/${categoriaId}`, `select[name="nomePorEmpresa[${index}]"]`);
                    carregarOpcoes(`/marcas/${categoriaId}`, `select[name="marcaPorEmpresa[${index}]"]`);
                    carregarOpcoes(`/tamanhos/${categoriaId}`,
                        `select[name="tamanhoPorEmpresa[${index}]"]`);
                    carregarOpcoes(`/cores/${categoriaId}`, `select[name="corPorEmpresa[${index}]"]`);
                    carregarOpcoes(`/fases/${categoriaId}`,
                        `select[name="faseEtariaPorEmpresa[${index}]"]`);
                }
            });
        });
    </script>
@endsection
