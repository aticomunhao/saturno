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
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Incluir Solicitação de Material
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação da Solicitação</h5>
                            <hr>
                            <div class="row" style="margin-left: 5px;">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">
                                        <label for="tipo-solicitacao">Selecione o tipo de solicitação</label>
                                        <br>
                                        <div class="btn-group" role="group" aria-label="Tipo de Solicitação">
                                            <button type="button" class="btn btn-primary" id="btnPorMaterial"
                                                aria-selected="true">
                                                Por Material</button>
                                            <button type="button" class="btn btn-secondary" id="btnPorEmpresa"
                                                aria-selected="false">
                                                Por Empresa</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="idSetor">Selecione seu Setor</label>
                                        <br>
                                        <select class="form-select select2" style="border: 1px solid #999999; padding: 5px;"
                                            id="idSetor" name="idSetor" required>
                                            <option value="" disabled selected>Selecione...</option>
                                            @foreach ($buscaSetor as $buscaSetors)
                                                <option value="{{ $buscaSetors->id }}">
                                                    {{ $buscaSetors->sigla }} - {{ $buscaSetors->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="idmotivo">Motivo</label>
                                    <br>
                                    <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                        name="motivo" required></textarea>
                                </div>
                            </div>
                            <div>
                                <div class="col-12 mt-3" id="listaMateriais" style="display: none;">
                                    <template id="templateMaterial">
                                        <div class="row material-item align-items-center">
                                            <div class="col-md-1 mb-3">
                                                <label for="quantidadeMaterial">Quantidade</label>
                                                <input type="number" class="form-control" name="quantidadeMaterial[]"
                                                    required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="categoriaMaterial">Categoria do Material</label>
                                                <select class="form-select js-categoria-material"
                                                    style="border: 1px solid #999999; padding: 5px;"
                                                    name="categoriaMaterial[]" required>
                                                    <option value="" disabled selected>Selecione...</option>
                                                    @foreach ($buscaCategoria as $buscaCategorias)
                                                        <option value="{{ $buscaCategorias->id }}">
                                                            {{ $buscaCategorias->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="nomeMaterial">Nome do Material</label>
                                                <input type="text" class="form-control" name="nomeMaterial[]"
                                                    placeholder="Digite o Nome do Material" required>
                                            </div>
                                            <div>Primeira Proposta
                                                <div class="col-md-1 mb-3">
                                                    <label for="arquivoProposta">Arquivo da Proposta</label>
                                                    <a type="file" class="btn" name="arquivoProposta1[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required><i class="bi bi-archive">
                                                        </i>
                                                    </a>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="linkProposta">Link da Proposta</label>
                                                    <input type="url" class="form-control" name="linkProposta1[]"
                                                        placeholder="Insira o link da proposta" required>
                                                </div>
                                            </div>
                                            <div>Segunda Proposta
                                                <div class="col-md-3 mb-3">
                                                    <label for="arquivoProposta">Arquivo da Proposta</label>
                                                    <input type="file" class="form-control" name="arquivoProposta2[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="linkProposta">Link da Proposta</label>
                                                    <input type="url" class="form-control" name="linkProposta2[]"
                                                        placeholder="Insira o link da proposta" required>
                                                </div>
                                            </div>
                                            <div>Terceira Propostas
                                                <div class="col-md-3 mb-3">
                                                    <label for="arquivoProposta">Arquivo da Proposta</label>
                                                    <input type="file" class="form-control" name="arquivoProposta3[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="linkProposta">Link da Proposta</label>
                                                    <input type="url" class="form-control" name="linkProposta3[]"
                                                        placeholder="Insira o link da proposta" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-3 d-flex align-items-center justify-content-center">
                                                <button type="button" class="btn btn-danger btn-remove-material">X</button>
                                            </div>
                                        </div>
                                    </template>
                                    <div class="col-12 mt-3">
                                        <button type="button" class="btn btn-success" id="addMaterial">Adicionar
                                            Material</button>
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
    </form>
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

            function addMaterial() {
                const novoMaterial = templateMaterial.content.cloneNode(true);
                listaMateriais.appendChild(novoMaterial);

                // Reaplica o Select2 aos selects adicionados
                $("#listaMateriais .js-categoria-material").select2({
                    placeholder: 'Selecione...',
                });
                $("#listaMateriais .js-categoria-material").next('.select2').find(
                    '.select2-selection--single').css('height', '35px');
            }

            toggleList('empresa');

            btnPorEmpresa.addEventListener('click', () => toggleList('empresa'));
            btnPorMaterial.addEventListener('click', () => toggleList('material'));

            btnAddMaterial.addEventListener('click', addMaterial);

            listaMateriais.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-remove-material')) {
                    const materialItem = e.target.closest('.material-item');
                    if (materialItem) {
                        materialItem.remove();
                    }
                }
            });
        });
    </script>
@endsection
