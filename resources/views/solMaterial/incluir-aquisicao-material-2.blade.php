@extends('layouts.app')

@section('title')
    Incluir Aquisição de Material
@endsection

@section('content')
    <form method="POST" action="/salvar-aquisicao-material" enctype="multipart/form-data">
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
                            <div class="row" style="margin-left: 5px;">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">
                                        <div class="btn-group" role="group" aria-label="Tipo de Solicitação">
                                            <button type="button" class="btn btn-primary" id="btnPorMaterial"
                                                aria-selected="true">
                                                Por Material</button>
                                            <button type="button" class="btn btn-secondary" id="btnPorEmpresa"
                                                aria-selected="false">
                                                Por Empresa</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="col-12 mt-3" id="listaMateriais" style="display: none;">
                                    <div class="col-12 mt-3 mb-2">
                                        <button type="button" class="btn btn-success" id="addMaterial"
                                            data-bs-toggle="modal" data-bs-target="#modalIncluirMaterial">Adicionar
                                            Material</button>
                                    </div>
                                    @foreach ($materiais as $index => $material)
                                        <div class="row material-item">
                                            <div class="col-md">
                                                <label>Categoria do Material</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoCategoria->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md">
                                                <label>Nome do Material</label>
                                                <input type="text" class="form-control" value="{{ $material->nome ?? 'Não especificado'}}"
                                                    >
                                            </div>
                                            <div class="col-md-2">
                                                <label>Unid. Medida</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoUnidadeMedida->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Quantidade</label>
                                                <input type="text" class="form-control" value="{{ $material->quantidade ?? 'Não especificado'}}"
                                                    >
                                            </div>
                                        </div>
                                        <div class="row material-item" style="margin-top: 20px">
                                            <div class="col-md">
                                                <label>Marca</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoCor->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md">
                                                <label>Tamanho</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoTamanho->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md">
                                                <label>Cor</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoCor->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md">
                                                <label>Fase Etária</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoFaseEtaria->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                            <div class="col-md">
                                                <label>Sexo</label>
                                                <input type="text" class="form-control" value="{{ $material->tipoSexo->nome ?? 'Não especificado'}}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Primeira Proposta</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Número da Proposta -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Número da 1ª Proposta</label>
                                                        <input type="text" class="form-control" name="numero1[]"
                                                            placeholder="Digite o Número da proposta">
                                                    </div>
                                                    <!-- Nome da Empresa -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Nome da 1ª Empresa</label>
                                                        <select class="form-select " name="razaoSocial1[]"
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
                                                        <label>Valor da 1ª Proposta</label>
                                                        <input type="text" class="form-control valor" name="valor1[]"
                                                            placeholder="Digite o valor da proposta"
                                                            oninput="formatarValorMoeda(this)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Data da Criação da Proposta -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Data da Criação da 1ª
                                                            Proposta</label>
                                                        <input type="date" class="form-control" name="dt_inicial1[]"
                                                            placeholder="Digite a data da proposta">
                                                    </div>

                                                    <!-- Data Limite da Proposta -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Data Limite da 1ª Proposta</label>
                                                        <input type="date" class="form-control" name="dt_final1[]"
                                                            placeholder="Digite a data final do prazo da proposta">
                                                    </div>

                                                    <!-- Arquivo da Proposta -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Arquivo da 1ª Proposta</label>
                                                        <input type="file" class="form-control" id="uploadProposta1"
                                                            name="arquivoProposta1[]"
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
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
                                                        <label>Link da 1ª Proposta</label>
                                                        <input type="text" class="form-control mt-2"
                                                            id="linkProposta1" name="linkProposta1[]"
                                                            placeholder="Link da Proposta" required>
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
                                                        <input type="text" class="form-control" name="numero2[]"
                                                            placeholder="Digite o Número da proposta">
                                                    </div>

                                                    <!-- Nome da Empresa -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Nome 2ª Empresa</label>
                                                        <select class="form-select " name="razaoSocial2[]"
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
                                                        <input type="text" class="form-control valor" name="valor2[]"
                                                            placeholder="Digite o valor da proposta"
                                                            oninput="formatarValorMoeda(this)">
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
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
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
                                                            placeholder="Link da Proposta" required>
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
                                                        <input type="text" class="form-control" name="numero3[]"
                                                            placeholder="Digite o Número da proposta">
                                                    </div>

                                                    <!-- Nome da Empresa -->
                                                    <div class="col-md-4 mb-3">
                                                        <label>Nome 3ª Empresa</label>
                                                        <select class="form-select " name="razaoSocial3[]"
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
                                                        <input type="text" class="form-control valor" name="valor3[]"
                                                            placeholder="Digite o valor da proposta"
                                                            oninput="formatarValorMoeda(this)">
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
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
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
                                                            placeholder="Link da Proposta" required>
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
                                    style="border: 1px solid #999999; padding: 5px;" name="categoriaMaterial" required>
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
                                    placeholder="Digite o Nome do Material" required>
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
                                <input type="number" class="form-control" name="quantidadeMaterial" required>
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
    <!-- FIM da Modal Aprovar em Lote -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnPorEmpresa = document.getElementById('btnPorEmpresa');
            const btnPorMaterial = document.getElementById('btnPorMaterial');
            const listaMateriais = document.getElementById('listaMateriais');
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
                } else if (activeButton === 'material') {
                    btnPorMaterial.classList.add('btn-primary');
                    btnPorMaterial.classList.remove('btn-secondary');
                    btnPorEmpresa.classList.add('btn-secondary');
                    btnPorEmpresa.classList.remove('btn-primary');

                    btnPorMaterial.setAttribute('aria-selected', 'true');
                    btnPorEmpresa.setAttribute('aria-selected', 'false');

                    listaMateriais.style.display = 'block';

                    if (!materialAdicionado) {
                        addMaterial();
                        materialAdicionado = true;
                    }
                }

            }

            btnPorEmpresa.addEventListener('click', () => toggleList('empresa'));
            btnPorMaterial.addEventListener('click', () => toggleList('material'));

            toggleList('empresa');
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
