@extends('layouts.app')

@section('title')
    Termo de Doação
@endsection

@section('content')
    <form class="form-horizontal mt-4" method="POST" action="/cad-inicial-material/doacao/{{ $idDocumento }}">
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>ID do Documento</label>
                                    <br>
                                    <input type="text" class="form-control"
                                        value="{{ $resultDocumento->id ?? 'Não especificado' }}" disabled>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Número do Documento</label>
                                    <br>
                                    <input type="text" class="form-control"
                                        value="{{ $resultDocumento->numero ?? 'Não especificado' }}" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- Ambos os botões na mesma div -->
                                <div class="col-md d-flex justify-content-start">
                                    <button type="button" class="btn btn-success me-2" id="addMaterial"
                                        data-bs-toggle="modal" data-bs-target="#modalIncluirMaterial">
                                        Adicionar Material
                                    </button>
                                    <button type="button" class="btn btn-success" id="addTermo" data-bs-toggle="modal"
                                        data-bs-target="#modalIncluirTermo">
                                        Incluir Documento
                                    </button>
                                    <input type="hidden" name="sacola" id="sacola" value="0">
                                    <button type="button" class="btn me-2" id="sacolaBtn" name="sacolaBtn"
                                        style="background-color: rgb(199, 7, 7); color: white; margin-left: 5px;">
                                        SACOLA
                                    </button>
                                </div>
                                <div class="col-md d-flex justify-content-end" style="margin-right: 15px;">
                                    <a href="{{ url('/recibo-doacao/pdf/' . $idDocumento) }}" target="_blank"
                                        class="btn btn-warning btn-sm" style="box-shadow: 3px 5px 6px #000000;">
                                        GERAR RECIBO
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left:5px">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>QTD.</th>
                                            <th>Categoria do Material</th>
                                            <th>Item Material</th>
                                            <th>Tipo</th>
                                            <th>Embalagem</th>
                                            <th>Observação</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($result as $results)
                                            <tr>
                                                <td>{{ $results->id ?? 'N/A' }}</td>
                                                <td>{{ $results->quantidade ?? 'N/A' }}</td>
                                                <td>{{ $results->CategoriaMaterial->nome ?? 'N/A' }}</td>
                                                <td>{{ $results->ItemCatalogoMaterial->nome ?? 'N/A' }}</td>
                                                <td>{{ $results->TipoMaterial->nome ?? 'N/A' }}</td>
                                                <td>
                                                    @php
                                                        $emb = $results->Embalagem;
                                                        $partes = [];

                                                        if ($emb && $emb->qtde_n4 && $emb->unidadeMedida4) {
                                                            $partes[] = "{$emb->qtde_n4} {$emb->unidadeMedida4->nome}";
                                                        }
                                                        if ($emb && $emb->qtde_n3 && $emb->unidadeMedida3) {
                                                            $partes[] = "{$emb->qtde_n3} {$emb->unidadeMedida3->nome}";
                                                        }
                                                        if ($emb && $emb->qtde_n2 && $emb->unidadeMedida2) {
                                                            $partes[] = "{$emb->qtde_n2} {$emb->unidadeMedida2->nome}";
                                                        }
                                                        if ($emb && $emb->qtde_n1 && $emb->unidadeMedida) {
                                                            $partes[] = "{$emb->qtde_n1} {$emb->unidadeMedida->nome}";
                                                        }

                                                        $descricao = implode(' / ', $partes);
                                                    @endphp

                                                    {{ $descricao }}
                                                </td>
                                                <td>{{ $results->observacao }}</td>
                                                <td>

                                                    <a href="/gerenciar-embalagem/alterar/{{ $results->id }}"
                                                        class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                                        style="font-size: 1rem; color:#303030" data-placement="top"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditarMaterial"
                                                        title="Editar Embalagens">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endForeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-right: 10px; margin-left: 10px">
                                {{ $result->links('pagination::bootstrap-5') }}
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
        action="{{ url('/cadastro-inicial/incluir-material/' . $idDocumento) }}" title="Inclusão de Material">
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
            <div class="col-md-4" style="margin-top: 10px">
                <label>Tipo do Material</label>
                <!-- Campo visível: apenas para mostrar o nome -->
                <input type="text" id="tipoMaterialNome" class="form-control" disabled>
                <!-- Campo oculto: envia o ID no form -->
                <input type="hidden" id="tipoMaterial" name="tipoMaterial">
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Aplicação</label>
                <br>
                <input type="checkbox" id="checkAplicacao" name="checkAplicacao" disabled>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <label>Embalagem</label>
                <select class="form-select js-nome-material select2" id="embalagemMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="embalagemMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Quantidade</label>
                <input type="number" class="form-control" id="quantidadeMaterial" name="quantidadeMaterial" required>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modeloMaterial">
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Avariado</label>
                <br>
                <input type="checkbox" id="checkAvariado" name="checkAvariado">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Valor de Aquisição</label>
                <select class="form-select js-marca-material select2" id="valorAquisicaoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="valorAquisicaoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Valor de Venda</label>
                <select class="form-select js-marca-material select2" id="valorVendaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="valorVendaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Validade</label>
                <input type="date" class="form-control" name="dataValidadeMaterial">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Marca</label>
                <select class="form-select js-marca-material select2" id="marcaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="marcaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Tamanho</label>
                <select class="form-select js-tamanho-material select2" id="tamanhoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="tamanhoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Cor</label>
                <select class="form-select js-cor-material select2" id="corMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="corMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Fase Etária</label>
                <select class="form-select js-fase-material select2" id="faseEtariaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="faseEtariaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
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
            <div class="col-md-3" style="margin-top: 10px">
                <label>Veículo</label>
                <br>
                <input type="checkbox" id="checkVeiculo" name="checkVeiculo" disabled>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Número de Série</label>
                <br>
                <input type="checkbox" id="checkNumSerie" name="checkNumSerie" disabled>
            </div>
            <div>
                <div id="containerNumerosSerie" class="col-md" style="display: none; margin-top: 10px;">
                    <label>Números de Série:</label>
                    <div id="inputsNumerosSerie"></div>
                </div>
            </div>
            <div>
                <div id="containerVeiculo" class="col-md" style="display: none; margin-top: 10px;">
                    <div id="inputsVeiculo"></div>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Fabricação</label>
                <input type="date" class="form-control" name="dataFabricacaoMaterial">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Fab. Modelo</label>
                <input type="date" class="form-control" name="dataFabricacaoModeloMaterial">
            </div>
            <div class="col-md-12" style="margin-top: 10px">
                <label>Observação</label>
                <textarea type="text" class="form-control" name="observacaoMaterial" rows="2"></textarea>
            </div>
        </div>
    </x-modal-incluir>
    <x-modal-incluir id="modalIncluirTermo" labelId="modalIncluirTermoLabel"
        action="{{ url('/cadastro-inicial/incluir-termo/' . $idDocumento) }}" title="Inclusão de Termo">
        <div class="row termo">
            <div class="col-md-6">
                <label>Empresa/Entidade</label>
                <select class="form-select  select2" id="empresaDocDoacao"
                    style="border: 1px solid #999999; padding: 5px;" name="empresaDocDoacao">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaEmpresa as $buscaEmpresas)
                        <option value="{{ $buscaEmpresas->id }}">
                            {{ $buscaEmpresas->razaosocial }} - {{ $buscaEmpresas->nomefantasia }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Selecione seu Setor</label>
                <br>
                <select class="form-select  select2" id="setorDocDoacao" style="border: 1px solid #999999; padding: 5px;"
                    name="setorDocDoacao">
                    <option value="" disabled selected>Selecione...
                    </option>
                    @foreach ($buscaSetor as $buscaSetors)
                        <option value="{{ $buscaSetors->id }}">
                            {{ $buscaSetors->sigla }} - {{ $buscaSetors->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Alterar Número da Proposta</label>
                <input type="text" class="form-control" style="background-color: white; border-color: gray;"
                    value="{{ old('numeroDocDoacao', $resultDocumento->numero ?? '') }}" id="numeroDocDoacao"
                    name="numeroDocDoacao">
            </div>
            <!-- Arquivo da Proposta -->
            <div class="col-md-6">
                <label>Arquivo do Termo de Doação</label>
                <input type="file" class="form-control" style="background-color: white; border-color: gray;"
                    id="arquivoDocDoacao" name="arquivoDocDoacao" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
            </div>
        </div>
    </x-modal-incluir>
    <x-modal-editar id="modalEditarMaterial" labelId="modalEditarMaterialLabel" title="Editar Material"
        action="{{ url('/cadastro-inicial/editar-material/' . $idDocumento) }}">
        @method('PUT')
        <div class="row">
            <div class="col-md-6" style="margin-top: 10px">
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
            <div class="col-md-6" style="margin-top: 10px">
                <label>Nome do Material</label>
                <select class="form-select js-nome-material select2" id="nomeMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="nomeMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <label>Tipo do Material</label>
                <!-- Campo visível: apenas para mostrar o nome -->
                <input type="text" id="tipoMaterialNome" class="form-control" disabled>
                <!-- Campo oculto: envia o ID no form -->
                <input type="hidden" id="tipoMaterial" name="tipoMaterial">
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Aplicação</label>
                <br>
                <input type="checkbox" id="checkAplicacao" name="checkAplicacao" disabled>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <label>Embalagem</label>
                <select class="form-select js-nome-material select2" id="embalagemMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="embalagemMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Quantidade</label>
                <input type="number" class="form-control" id="quantidadeMaterial" name="quantidadeMaterial" required>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modeloMaterial">
            </div>
            <div class="col-md-2" style="margin-top: 10px">
                <label>Avariado</label>
                <br>
                <input type="checkbox" id="checkAvariado" name="checkAvariado">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Valor de Aquisição</label>
                <select class="form-select js-marca-material select2" id="valorAquisicaoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="valorAquisicaoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Valor de Venda</label>
                <select class="form-select js-marca-material select2" id="valorVendaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="valorVendaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Validade</label>
                <input type="date" class="form-control" name="dataValidadeMaterial">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Marca</label>
                <select class="form-select js-marca-material select2" id="marcaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="marcaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Tamanho</label>
                <select class="form-select js-tamanho-material select2" id="tamanhoMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="tamanhoMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Cor</label>
                <select class="form-select js-cor-material select2" id="corMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="corMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Fase Etária</label>
                <select class="form-select js-fase-material select2" id="faseEtariaMaterial"
                    style="border: 1px solid #999999; padding: 5px;" name="faseEtariaMaterial">
                    <option value="" disabled selected>Selecione...
                    </option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
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
            <div class="col-md-3" style="margin-top: 10px">
                <label>Veículo</label>
                <br>
                <input type="checkbox" id="checkVeiculo" name="checkVeiculo" disabled>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Número de Série</label>
                <br>
                <input type="checkbox" id="checkNumSerie" name="checkNumSerie" disabled>
            </div>
            <div>
                <div id="containerNumerosSerie" class="col-md" style="display: none; margin-top: 10px;">
                    <label>Números de Série:</label>
                    <div id="inputsNumerosSerie"></div>
                </div>
            </div>
            <div>
                <div id="containerVeiculo" class="col-md" style="display: none; margin-top: 10px;">
                    <div id="inputsVeiculo"></div>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Fabricação</label>
                <input type="date" class="form-control" name="dataFabricacaoMaterial">
            </div>
            <div class="col-md-3" style="margin-top: 10px">
                <label>Data de Fab. Modelo</label>
                <input type="date" class="form-control" name="dataFabricacaoModeloMaterial">
            </div>
            <div class="col-md-12" style="margin-top: 10px">
                <label>Observação</label>
                <textarea type="text" class="form-control" name="observacaoMaterial" rows="2"></textarea>
            </div>
        </div>
    </x-modal-editar>
    {{-- Botão de SACOLA --}}
    <script>
        document.getElementById('sacolaBtn').addEventListener('click', function() {
            const btn = this;
            const isActive = btn.classList.toggle('ativo');
            btn.style.backgroundColor = isActive ? 'rgb(3, 109, 3)' : 'rgb(199, 7, 7)';
            document.getElementById('sacola').value = isActive ? '1' : '0';
        });
    </script>
@endsection
