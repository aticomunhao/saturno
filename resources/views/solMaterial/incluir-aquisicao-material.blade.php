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
                                        <div class="d-flex align-items-center material-item mb-3">
                                            <div class="col-md-1 me-3">
                                                <label for="quantidadeMaterial">Quantidade</label>
                                                <input type="number" class="form-control" name="quantidadeMaterial[]"
                                                    required>
                                            </div>
                                            <div class="col-md-3 me-3">
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
                                            <div class="col-md-3 me-3">
                                                <label for="nomeMaterial">Nome do Material</label>
                                                <input type="text" class="form-control" name="nomeMaterial[]"
                                                    placeholder="Digite o Nome do Material" required>
                                            </div>
                                            <div class="col-md-1 d-flex flex-column align-items-center">
                                                <label for="arquivoProposta">Primeira Proposta</label>
                                                <div class="d-flex">
                                                    <a id="uploadButton1" class="btn btn-danger"
                                                        onclick="document.getElementById('uploadProposta1').click()" title="Arquivo">
                                                        <i class="bi bi-archive"></i>
                                                    </a>
                                                    <input type="file" id="uploadProposta1" name="arquivoProposta1[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" style="display: none;"
                                                        required onchange="changeButtonColor('uploadButton1')">
                                                    <a id="linkButton1" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#linkModal1" title="Link">
                                                        <i class="bi bi-link-45deg"></i>
                                                    </a>
                                                    <input type="hidden" id="linkProposta1" name="linkProposta1[]"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex flex-column align-items-center">
                                                <label for="arquivoProposta">Segunda Proposta</label>
                                                <div class="d-flex">
                                                    <a id="uploadButton2" class="btn btn-danger"
                                                        onclick="document.getElementById('uploadProposta2').click()" title="Arquivo">
                                                        <i class="bi bi-archive"></i>
                                                    </a>
                                                    <input type="file" id="uploadProposta2" name="arquivoProposta2[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" style="display: none;"
                                                        required onchange="changeButtonColor('uploadButton2')">
                                                    <a id="linkButton2" class="btn btn-danger ms-2"
                                                        data-bs-toggle="modal" data-bs-target="#linkModal2">
                                                        <i class="bi bi-link-45deg" title="Link"></i>
                                                    </a>
                                                    <input type="hidden" id="linkProposta2" name="linkProposta2[]"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex flex-column align-items-center">
                                                <label for="arquivoProposta">Terceira Proposta</label>
                                                <div class="d-flex">
                                                    <a id="uploadButton3" class="btn btn-danger"
                                                        onclick="document.getElementById('uploadProposta3').click()" title="Arquivo">
                                                        <i class="bi bi-archive"></i>
                                                    </a>
                                                    <input type="file" id="uploadProposta3" name="arquivoProposta3[]"
                                                        accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" style="display: none;"
                                                        required onchange="changeButtonColor('uploadButton3')">
                                                    <a id="linkButton3" class="btn btn-danger ms-2"
                                                        data-bs-toggle="modal" data-bs-target="#linkModal3">
                                                        <i class="bi bi-link-45deg" title="Link"></i>
                                                    </a>
                                                    <input type="hidden" id="linkProposta3" name="linkProposta3[]"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                <button type="button"
                                                    class="btn btn-danger btn-remove-material" style="margin-top: 21px;">X</button>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="col-12 mt-3 mb-2">
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
                <button type="submit" value="Confirmar"
                    class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
                </button>
            </div>
        </div>
        <!-- Modal para inserir o 1 link -->
        <div class="modal fade" id="linkModal1" tabindex="-1" aria-labelledby="linkModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color:lightblue;">
                        <h5 class="modal-title"
                        id="linkModalLabel1">Inserir Link da Proposta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="linkInput1">Link:</label>
                        <input type="url" id="linkInput1" class="form-control"
                            placeholder="Insira o link da proposta" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="saveLink1()"
                            data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para inserir o 2 link -->
        <div class="modal fade" id="linkModal2" tabindex="-1" aria-labelledby="linkModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color:lightblue;">
                        <h5 class="modal-title"
                        id="linkModalLabel2">Inserir Link da Proposta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="linkInput2">Link:</label>
                        <input type="url" id="linkInput2" class="form-control"
                            placeholder="Insira o link da proposta" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="saveLink2()"
                            data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para inserir o 3 link -->
        <div class="modal fade" id="linkModal3" tabindex="-1" aria-labelledby="linkModalLabel3" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color:lightblue;">
                        <h5 class="modal-title"
                        id="linkModalLabel3">Inserir Link da Proposta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="linkInput3">Link:</label>
                        <input type="url" id="linkInput3" class="form-control"
                            placeholder="Insira o link da proposta" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="saveLink3()"
                            data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </div>
            </div>
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
    <script>
        function changeButtonColor(buttonId) {
            const button = document.getElementById(buttonId);
            const fileInput = document.getElementById('uploadProposta1');
            if (fileInput.files.length > 0) {
                button.classList.remove('btn-danger');
                button.classList.add('btn-success');
            } else {
                button.classList.remove('btn-success');
                button.classList.add('btn-danger');
            }
        }

        function saveLink1() {
            const linkInput1 = document.getElementById('linkInput1');
            const hiddenInput1 = document.getElementById('linkProposta1');
            const linkButton1 = document.getElementById('linkButton1');

            if (linkInput1.value) {
                hiddenInput1.value = linkInput1.value;

                // Alterar a classe do botão para vermelho (btn-danger)
                linkButton1.classList.remove('btn-danger');
                linkButton1.classList.add('btn-success');
            } else {
                alert('Por favor, insira um link válido.');
            }
        }
        function saveLink2() {
            const linkInput2 = document.getElementById('linkInput2');
            const hiddenInput2 = document.getElementById('linkProposta2');
            const linkButton2 = document.getElementById('linkButton2');

            if (linkInput2.value) {
                hiddenInput2.value = linkInput2.value;

                // Alterar a classe do botão para vermelho (btn-danger)
                linkButton2.classList.remove('btn-danger');
                linkButton2.classList.add('btn-success');
            } else {
                alert('Por favor, insira um link válido.');
            }
        }
        function saveLink3() {
            const linkInput3 = document.getElementById('linkInput3');
            const hiddenInput3 = document.getElementById('linkProposta3');
            const linkButton3 = document.getElementById('linkButton3');

            if (linkInput3.value) {
                hiddenInput3.value = linkInput3.value;

                // Alterar a classe do botão para vermelho (btn-danger)
                linkButton3.classList.remove('btn-danger');
                linkButton3.classList.add('btn-success');
            } else {
                alert('Por favor, insira um link válido.');
            }
        }
    </script>
@endsection
