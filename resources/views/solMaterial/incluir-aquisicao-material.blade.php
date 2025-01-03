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
                                        <div class="card mb-3">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Material</h5>
                                                <button type="button" class="btn btn-danger btn-remove-material"
                                                    style="margin-top: 0;">X</button>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex align-items-start material-item">
                                                    <div class="me-3" style="flex: 1;">
                                                        <label for="quantidadeMaterial">Quantidade</label>
                                                        <input type="number" class="form-control"
                                                            name="quantidadeMaterial[]" required>
                                                    </div>
                                                    <div class="me-3" style="flex: 2;">
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
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="nomeMaterial">Nome do Material</label>
                                                        <input type="text" class="form-control" name="nomeMaterial[]"
                                                            placeholder="Digite o Nome do Material" required>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start material-item mt-3">
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="marcaMaterial">Marca</label>
                                                        <select class="form-select js-categoria-material"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="marcaMaterial[]" required>
                                                            <option value="" disabled selected>Selecione...</option>
                                                            @foreach ($buscaMarca as $buscaMarcas)
                                                                <option value="{{ $buscaMarcas->id }}">
                                                                    {{ $buscaMarcas->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="tamanhoMaterial">Tamanho</label>
                                                        <select class="form-select js-categoria-material"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="tamanhoMaterial[]" required>
                                                            <option value="" disabled selected>Selecione...</option>
                                                            @foreach ($buscaTamanho as $buscaTamanhos)
                                                                <option value="{{ $buscaTamanhos->id }}">
                                                                    {{ $buscaTamanhos->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="corMaterial">Cor</label>
                                                        <select class="form-select js-categoria-material"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="corMaterial[]" required>
                                                            <option value="" disabled selected>Selecione...</option>
                                                            @foreach ($buscaCor as $buscaCors)
                                                                <option value="{{ $buscaCors->id }}">
                                                                    {{ $buscaCors->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="faseEtariaMaterial">Fase Etaria</label>
                                                        <select class="form-select js-categoria-material"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="faseEtariaMaterial[]" required>
                                                            <option value="" disabled selected>Selecione...</option>
                                                            @foreach ($buscaFaseEtaria as $buscaFaseEtarias)
                                                                <option value="{{ $buscaFaseEtarias->id }}">
                                                                    {{ $buscaFaseEtarias->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="sexoMaterial">Sexo</label>
                                                        <select class="form-select js-categoria-material"
                                                            style="border: 1px solid #999999; padding: 5px;"
                                                            name="sexoMaterial[]" required>
                                                            <option value="" disabled selected>Selecione...</option>
                                                            @foreach ($buscaSexo as $buscaSexos)
                                                                <option value="{{ $buscaSexos->id }}">
                                                                    {{ $buscaSexos->nome }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start material-item mt-3">
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="arquivoProposta">Primeira Proposta</label>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="numero">Número da Proposta</label>
                                                            <input type="text" class="form-control" name="numero[]"
                                                                placeholder="Digite o Número da proposta">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="razaoSocial">Nome Empresa</label>
                                                            <select class="form-select js-nome-empresa"
                                                                style="border: 1px solid #999999; padding: 5px;"
                                                                name="razaoSocial[]">
                                                                <option></option>
                                                                @foreach ($buscaEmpresa as $buscaEmpresas)
                                                                    <option value="{{ $buscaEmpresas->id }}">
                                                                        {{ $buscaEmpresas->razaosocial }} -
                                                                        {{ $buscaEmpresas->nomefantasia }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label>Valor</label>
                                                            <input type="text" class="form-control valor"
                                                                name="valor[]" placeholder="Digite o valor da proposta"
                                                                oninput="formatarValorMoeda(this)">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="dt_inicial">Data da Proposta</label>
                                                            <input type="date" class="form-control"
                                                                name="dt_inicial[]"
                                                                placeholder="Digite a data da proposta">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="dt_final">Data Limite</label>
                                                            <input type="date" class="form-control" name="dt_final[]"
                                                                placeholder="Digite a data final do prazo da proposta"
                                                                min="">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="arquivo">Arquivo da Proposta</label>
                                                            <input type="file" class="form-control" name="arquivo[]"
                                                                placeholder="Insira o arquivo da proposta">
                                                        </div>
                                                        <div class="form-check col-md-4">
                                                            <label>Possui garantia?</label>
                                                            <input type="checkbox"
                                                                style="border: 1px solid #999999; padding: 5px;"
                                                                class="form-check-input" id="garantiaBotao"
                                                                name="garantiaBotao[]"
                                                                @if (old('garantiaBotao')) checked @endif>
                                                        </div>
                                                        <div id="tempoGarantia" class="col-md-4 mb-3"
                                                            style="display: none;">
                                                            <label for="tempoGarantiaInput">Tempo de Garantia (em
                                                                dias)</label>
                                                            <input type="number" class="form-control"
                                                                id="tempoGarantiaInput" name="tempoGarantia[]"
                                                                placeholder="Digite o tempo de garantia">
                                                        </div>
                                                        <input type="file" class="form-control mb-2"
                                                            id="uploadProposta1" name="arquivoProposta1[]"
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                                        <input type="text" class="form-control" id="linkProposta1"
                                                            name="linkProposta1[]" required>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="arquivoProposta">Segunda Proposta</label>
                                                        <input type="file" class="form-control mb-2"
                                                            id="uploadProposta2" name="arquivoProposta2[]"
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                                        <input type="text" class="form-control" id="linkProposta2"
                                                            name="linkProposta2[]" required>
                                                    </div>
                                                    <div class="me-3" style="flex: 3;">
                                                        <label for="arquivoProposta">Terceira Proposta</label>
                                                        <input type="file" class="form-control mb-2"
                                                            id="uploadProposta3" name="arquivoProposta3[]"
                                                            accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                                        <input type="text" class="form-control" id="linkProposta3"
                                                            name="linkProposta3[]" required>
                                                    </div>
                                                </div>
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
