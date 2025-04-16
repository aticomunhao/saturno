@extends('layouts.app')

@section('title')
    Gerenciar Cadastro Inicial
@endsection
@section('content')
    <form method="GET" action="/gerenciar-cadastro-inicial">{{-- Formulario de pesquisa --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Gerenciar Cadastro Inicial
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="row" style="margin-left:5px">
                                <div class="col-md d-flex">
                                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#filtros" style="box-shadow: 3px 5px 6px #000000; ">
                                        Filtrar <i class="bi bi-funnel"></i>
                                    </button>
                                </div>

                                <div class="col-md d-flex justify-content-end">
                                    <a href="gerenciar-cadastro-inicial/incluir" class="btn btn-success"
                                        style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; ">
                                        Novo+
                                    </a>
                                </div>
                            </div>
                            <br>
                            <hr>
                            {{-- @foreach ($aquisicao as $aquisicaos)
                                @if (in_array($aquisicaos->id_setor, ['1', '2', '5', $setor])) --}}
                            <table {{-- Inicio da tabela de informacoes --}}
                                class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle"
                                id="tabela-materiais" style="width: 100%">
                                <thead style="text-align: center;">{{-- inicio header tabela --}}
                                    <tr style="background-color: #d6e3ff; font-size:15px; color:#000;" class="align-middle">
                                        <th>
                                            <div style="display: flex; justify-content: center; align-items: center;">
                                                <input type="checkbox" id="selectAll" onclick="toggleCheckboxes(this)"
                                                    aria-label="Selecionar todos" style="border: 1px solid #000">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>DATA</th>
                                        <th>N/A</th>
                                        <th>N/A</th>
                                        <th>STATUS</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>{{-- Fim do header da tabela --}}
                                <tbody style="font-size: 15px; color:#000000; text-align: center;">
                                    {{-- Inicio body tabela --}}
                                    @foreach ($cadastroInicial as $cadastroInicials)
                                        <tr>
                                            <td>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <input class="form-check-input item-checkbox" type="checkbox"
                                                        id="checkboxNoLabel" value="{{ $cadastroInicials->id }}"
                                                        aria-label="..." style="border: 1px solid #000">
                                                </div>
                                            </td>
                                            <td>{{ $cadastroInicials->id ?? 'N/A' }}</td>
                                            <td>{{ $cadastroInicials->data_cadastro ? \Carbon\Carbon::parse($aquisicaos->data)->format('d/m/Y') : 'N/A' }}
                                            </td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>{{ $cadastroInicials->status->descricao ?? 'N/A' }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-primary" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Visualizar">
                                                    <i class="bi bi-search"></i>
                                                </a>
                                                {{-- @if (in_array($aquisicaos->tipoStatus->id, ['3', '2'])) --}}
                                                <a href="" class="btn btn-sm btn-outline-primary" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Aprovar">
                                                    <i class="bi bi-check-lg"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if ($aquisicaos->tipoStatus->id == '3') --}}
                                                <a href="" class="btn btn-sm btn-outline-success" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Homologar">
                                                    <i class="bi bi-clipboard-check"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if ($aquisicaos->tipoStatus->id == '1') --}}
                                                <a href="" class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-primary" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Enviar">
                                                    <i class="bi bi-cart-check"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if (isset($aquisicaos->aut_usu_pres, $aquisicaos->aut_usu_adm, $aquisicaos->aut_usu_daf)) --}}
                                                <a href="" class="btn btn-sm btn-outline-info" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Aceite">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if ($aquisicaos->tipoStatus->id == '1') --}}
                                                <a href="#" class="btn btn-sm btn-outline-danger excluirSolicitacao"
                                                    data-tt="tooltip" style="font-size: 1rem; color:#303030"
                                                    data-placement="top" title="Excluir" data-bs-toggle="modal"
                                                    data-bs-target="#modalExcluirSolicitacao">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- Fim body da tabela --}}
                            </table>
                            {{-- @endif
                            @endforeach --}}
                        </div>
                        <div style="margin-right: 10px; margin-left: 10px">
                            {{ $cadastroInicial->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Filtros -->
        <div class="modal fade" id="filtros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:grey;color:white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Filtrar Opções</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <div class="row col-10">
                                <div class="col-md-6 col-sm-12 mb-2">Por Depósito
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaDeposito" id="idPesquisaDeposito">
                                        <option value="">Todos</option>
                                        @foreach ($deposito as $depositos)
                                            <option value="{{ $depositos->id }}"
                                                {{ old('pesquisaDeposito') == $depositos->id ? 'selected' : '' }}>
                                                {{ $depositos->sigla }} - {{ $depositos->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Período
                                    <div class="d-flex gap-2">
                                        <input type="date" class="form-control" name="pesquisaDataInicioPeriodo"
                                            id="idPesquisaDataInicioPeriodo"
                                            value="{{ request('pesquisaDataInicioPeriodo') }}"
                                            style="border: 1px solid #999999; background-color: #ffffff;">
                                        <input type="date" class="form-control" name="pesquisaDataFimPeriodo"
                                            id="idPesquisaDataFimPeriodo" value="{{ request('pesquisaDataFimPeriodo') }}"
                                            style="border: 1px solid #999999; background-color: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Destinação
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaDestinacao" id="idPesquisaDestinacao">
                                        <option value="">Todos</option>
                                        @foreach ($destinacao as $destinacaos)
                                            <option value="{{ $destinacaos->id }}"
                                                {{ old('pesquisaDestinacao') == $destinacaos->id ? 'selected' : '' }}>
                                                {{ $destinacaos->descricao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Categoria do Material
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaCategoriaMaterial" id="idPesquisaCategoriaMaterial">
                                        <option value="">Todos</option>
                                        @foreach ($categoriaMaterial as $categoriaMaterials)
                                        <option value="{{ $categoriaMaterials->id }}"
                                            {{ old('pesquisaCategoriaMaterial') == $categoriaMaterials->id ? 'selected' : '' }}>
                                            {{ $categoriaMaterials->nome }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Empresa
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaEmpresa" id="idPesquisaEmpresa">
                                        <option value="">Todos</option>
                                        @foreach ($empresa as $empresas)
                                        <option value="{{ $empresas->id }}"
                                            {{ old('pesquisaEmpresa') == $empresas->id ? 'selected' : '' }}>
                                            {{ $empresas->razaosocial }} - {{ $empresas->nomefantasia }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Nome do Material
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaNomeMaterial" id="idPesquisaNomeMaterial">
                                        <option value="">Todos</option>
                                        @foreach ($nomeMaterial as $nomeMaterials)
                                        <option value="{{ $nomeMaterials->id }}"
                                            {{ old('pesquisaNomeMaterial') == $nomeMaterials->id ? 'selected' : '' }}>
                                            {{ $nomeMaterials->nome }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Tipo de Documento
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaDocumento" id="idPesquisaDocumento">
                                        <option value="">Todos</option>
                                        @foreach ($tipoDocumento as $tipoDocumentos)
                                        <option value="{{ $tipoDocumentos->id }}"
                                            {{ old('pesquisaDocumento') == $tipoDocumentos->id ? 'selected' : '' }}>
                                            {{ $tipoDocumentos->sigla }} - {{ $tipoDocumentos->descricao }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Tipo de Material
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaTipoMaterial" id="idPesquisaTipoMaterial">
                                        <option value="">Todos</option>
                                        @foreach ($tipoMaterial as $tipoMaterials)
                                        <option value="{{ $tipoMaterials->id }}"
                                            {{ old('pesquisaTipoMaterial') == $tipoMaterials->id ? 'selected' : '' }}>
                                            {{ $tipoMaterials->nome }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Solicitação de Material
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaSolicitacao" id="idPesquisaSolicitacao">
                                        <option value="">Todos</option>
                                        @foreach ($solMat as $solMats)
                                        <option value="{{ $solMats->id }}"
                                            {{ old('pesquisaSolicitacao') == $solMats->id ? 'selected' : '' }}>
                                            {{ $solMats->id }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">Por Status
                                    <select class="form-select select2" style="border: 1px solid #999999;"
                                        name="pesquisaStatus" id="idPesquisaStatus">
                                        <option value="">Todos</option>
                                        @foreach ($status as $statuss)
                                        <option value="{{ $statuss->id }}"
                                            {{ old('pesquisaStatus') == $statuss->id ? 'selected' : '' }}>
                                            {{ $statuss->descricao }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <a class="btn btn-secondary" href="/gerenciar-cadastro-inicial">Limpar</a>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>{{-- Final Formulario de pesquisa --}}

    <!-- Modal Excluir Solicitação -->
    <div class="modal fade" id="modalExcluirSolicitacao" tabindex="-1" aria-labelledby="modalExcluirSolicitacaoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="formExcluirSolicitacao" class="form-horizontal" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#DC4C64;">
                        <h5 class="modal-title" id="modalExcluirSolicitacaoLabel">Exclusão de Solicitação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content-excluir-material">
                        Deseja realmente excluir a solicitação de Número: <span id="solicitacaoId"
                            style="color: #DC4C64"></span>?
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
        $(document).ready(function() {
            function populateMateriais(selectElement, classeMaterialValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-materiais/" + classeMaterialValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        selectElement.append(
                            '<option value="">Selecione um material</option>'
                        );
                        $.each(response, function(index, item) {
                            selectElement.append(
                                '<option value="' +
                                item.id +
                                '">' +
                                item.descricao +
                                "</option>"
                            );
                        });
                        selectElement.prop("disabled", false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Ocorreu um erro:", error);
                        console.log(xhr.responseText);
                    },
                });
            }

            $("#classeServico").change(function() {
                var classeServicoValue = $(this).val();
                var materiaisSelect = $("#materiais");

                if (!classeMaterialValue) {
                    materiaisSelect
                        .empty()
                        .append('<option value="">Selecione um material</option>');
                    servicosSelect.prop("disabled", true);
                    return;
                }

                populateMateriais(materiaisSelect, classeMaterialValue);
            });

            $("#add-proposta").click(function() {
                var newProposta = $("#template-proposta-comercial").html();
                $("#form-propostas-comerciais").append(newProposta);
            });

            $(document).on("click", ".remove-proposta", function() {
                $(this).closest(".proposta-comercial").remove();
            });
        });
    </script>
    <script>
        // Função para selecionar ou desmarcar todos os checkboxes
        function toggleCheckboxes(selectAllCheckbox) {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

        $(document).ready(function() {
            // Inicializa o Select2 dentro dos modais
            $('#modalAprovarLote, #modalHomologarLote').on('shown.bs.modal', function() {
                $('.select2').select2({
                    dropdownParent: $(this)
                });
            });

            // Configuração do modal de Aprovar em Lote
            $('#modalAprovarLote').on('show.bs.modal', function() {
                $('#modal-body-content-aprovar').empty();
                const selectedCheckboxes = $('.item-checkbox:checked');
                if (selectedCheckboxes.length === 0) {
                    alert('Por favor, selecione pelo menos uma solicitação.');
                    $('#modalAprovarLote').modal('hide');
                    return;
                }
                generateModalContent(selectedCheckboxes, '#modal-body-content-aprovar');
            });

            // Configuração do modal de Homologar em Lote
            $('#modalHomologarLote').on('show.bs.modal', function() {
                $('#modal-body-content-homologar').empty();
                const selectedCheckboxes = $('.item-checkbox:checked');
                if (selectedCheckboxes.length === 0) {
                    alert('Por favor, selecione pelo menos uma solicitação.');
                    $('#modalHomologarLote').modal('hide');
                    return;
                }
                generateModalContent(selectedCheckboxes, '#modal-body-content-homologar');
            });

            // Recarrega a página ao cancelar no modal
            $('.btn-danger[data-bs-dismiss="modal"]').on('click', function() {
                location.reload();
            });
        });
    </script>
    <style>
        .card-body {
            overflow-x: hidden;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".excluirSolicitacao").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("formExcluirSolicitacao");

                    // Atualiza a ação do formulário com o ID correto
                    form.setAttribute("action", "/deletar-aquisicao-material/" + id);

                    // Atualiza o texto dentro da modal
                    document.getElementById("solicitacaoId").textContent = id;
                });
            });
        });
    </script>
@endsection
