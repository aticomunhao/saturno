@extends('layouts.app')

@section('title')
    Gerenciar Aquisição de Serviços
@endsection
@section('content')
    <form method="GET" action="/gerenciar-aquisicao-servicos">{{-- Formulario de pesquisa --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Gerenciar Aquisição de Serviços
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="ROW" style="margin-left:5px">
                                <div style="display: flex; gap: 20px; align-items: flex-end;">
                                    <div class="col-md-2 col-sm-12">Classe do Serviço
                                        <br>
                                        <select class="js-example-responsive form-select select2"
                                            style="border: 1px solid #999999; padding: 5px;" id="classeServico"
                                            name="classe">
                                            <option value=""></option>
                                            @foreach ($classeAquisicao as $classeAquisicaos)
                                                <option value="{{ $classeAquisicaos->id }}" {{ old('classe') }}>
                                                    {{ $classeAquisicaos->descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Tipo de Serviço
                                        <br>
                                        <select class="js-example-responsive form-select select2"
                                            style="border: 1px solid #999999;" id="servicos" name="servicos"
                                            value="{{ old('servicos') }}" disabled>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12">Status
                                        <select class="form-select" style="border: 1px solid #999999;" name="status_servico"
                                            value="" id="statusServico">
                                            <option value="">Todos</option>
                                            @foreach ($status as $statuss)
                                                <option value="{{ $statuss->id }}"
                                                    {{ old('status_servicos') == $statuss->id ? 'selected' : '' }}>
                                                    {{ $statuss->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-light btn-sm "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px;"{{-- Botao submit do formulario de pesquisa --}}
                                            type="submit">Pesquisar
                                        </button>
                                        <a href="/gerenciar-aquisicao-servicos" type="button" class="btn btn-light btn-sm"
                                            style="box-shadow: 1px 2px 5px #000000; font-size: 1rem"
                                            value="">Limpar</a>
                                        <a href="/incluir-aquisicao-servicos" class="btn btn-success"
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-left:5px">
                                            Novo+
                                        </a>
                                    </div>
                                </div>
                                <div class="ROW justify-content-start">
                                    <div class="col-12" style="margin-top:10px;">
                                        <a href="" class="btn btn-primary"
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px"
                                            data-bs-toggle="modal" data-bs-target="#modalAprovarLote">
                                            Aprovar em Lote
                                        </a>
                                        <a href="/incluir-aquisicao-servicos" class="btn btn-success "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px">
                                            Homologar em Lote
                                        </a>
                                        <a href="/incluir-aquisicao-servicos" class="btn btn-warning "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px">
                                            Confirmar em Lote
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <table {{-- Inicio da tabela de informacoes --}}
                                class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle"
                                id="tabela-servicos">
                                <thead style="text-align: center;">{{-- inicio header tabela --}}
                                    <tr style="background-color: #d6e3ff; font-size:15px; color:#000;" class="align-middle">
                                        <th>
                                            <div style="display: flex; justify-content: center; align-items: center;">
                                                <input type="checkbox" id="selectAll" onclick="toggleCheckboxes(this)"
                                                    aria-label="Selecionar todos" style="border: 1px solid #000">
                                            </div>
                                        </th>
                                        <th>NÚMERO</th>
                                        <th>DATA</th>
                                        <th>TIPO SERVIÇO</th>
                                        <th>SETOR</th>
                                        <th>PRIORIDADE</th>
                                        <th>STATUS</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>{{-- Fim do header da tabela --}}
                                <tbody style="font-size: 15px; color:#000000; text-align: center;">{{-- Inicio body tabela --}}
                                    @foreach ($aquisicao as $aquisicaos)
                                        <tr>
                                            <td>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <input class="form-check-input item-checkbox" type="checkbox"
                                                        id="checkboxNoLabel" value="{{ $aquisicaos->id }}" aria-label="..."
                                                        style="border: 1px solid #000">
                                                </div>
                                            </td>
                                            <td>{{ $aquisicaos->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($aquisicaos->data)->format('d/m/Y') }}</td>
                                            <td>{{ $aquisicaos->CatalogoServico->descricao }}</td>
                                            <td>{{ $aquisicaos->setor->nome }}</td>
                                            <td>{{ $aquisicaos->prioridade }}</td>
                                            <td>{{ $aquisicaos->tipoStatus->nome }}</td>
                                            <td>
                                                <a href="/aprovar-aquisicao-servicos/{{ $aquisicaos->id }}"
                                                    class="btn btn-sm btn-outline-primary" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Aprovar">
                                                    <i class="bi bi-check-lg"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-success" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Homologar">
                                                    <i class="bi bi-clipboard-check"></i>
                                                </a>
                                                <a href="/editar-aquisicao-servicos/{{ $aquisicaos->id }}"
                                                    class="btn btn-sm btn-outline-warning" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="/enviar-aquisicao-servicos/{{ $aquisicaos->id }}"
                                                    class="btn btn-sm btn-outline-primary" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Enviar">
                                                    <i class="bi bi-cart-check"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-primary"
                                                    data-tt="tooltip" style="font-size: 1rem; color:#303030"
                                                    data-placement="top" title="visualizar">
                                                    <i class="bi bi-search"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-info" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Aceite">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-warning"
                                                    data-tt="tooltip" style="font-size: 1rem; color:#303030"
                                                    data-placement="top" title="Confirmar">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-warning"
                                                    data-tt="tooltip" style="font-size: 1rem; color:#303030"
                                                    data-placement="top" title="Editar Compra">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-danger" data-tt="tooltip"
                                                    style="font-size: 1rem; color:#303030" data-placement="top"
                                                    title="Excluir">
                                                    <i class="bi bi-x-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- Fim body da tabela --}}
                            </table>
                        </div>
                        <div style="margin-right: 10px; margin-left: 10px">
                            {{ $aquisicao->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>{{-- Final Formulario de pesquisa --}}

    <!-- Modal Aprovar em Lote -->
    <div class="modal fade" id="modalAprovarLote" tabindex="-1" aria-labelledby="modalAprovarLoteLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="form-horizontal" method="POST" action="{{ url('/aprovar-em-lote') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#DC4C64;">
                        <h5 class="modal-title" id="modalAprovarLoteLabel">Confirmar Aprovação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        <!-- O conteúdo dinâmico será inserido aqui -->
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
            function populateServicos(selectElement, classeServicoValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
                    dataType: "json",
                    success: function(response) {
                        selectElement.empty();
                        selectElement.append(
                            '<option value="">Selecione um serviço</option>'
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
                var servicosSelect = $("#servicos");

                if (!classeServicoValue) {
                    servicosSelect
                        .empty()
                        .append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop("disabled", true);
                    return;
                }

                populateServicos(servicosSelect, classeServicoValue);
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
            // Inicializa o Select2 dentro da modal
            $('#modalAprovarLote').on('shown.bs.modal', function() {
                $('.select2').select2({
                    dropdownParent: $(
                        '#modalAprovarLote') // Define a modal como o container do dropdown
                });
            });

            $('#modalAprovarLote').on('show.bs.modal', function() {
                // Limpa o conteúdo anterior
                $('#modal-body-content').empty();

                // Seleciona todos os checkboxes marcados
                const selectedCheckboxes = $('.item-checkbox:checked');

                if (selectedCheckboxes.length === 0) {
                    // Se não houver checkboxes selecionados, fecha a modal
                    alert('Por favor, selecione pelo menos uma solicitação.');
                    $('#modalAprovarLote').modal('hide');
                    return;
                }

                // Itera sobre cada checkbox selecionado
                selectedCheckboxes.each(function() {
                    const id = $(this).val(); // Obtém o valor (ID) do checkbox

                    // Cria um novo conjunto de opções para prioridade e setor
                    const newContent = `
                    <div class="row mb-3" data-id="${id}">
                        <div class="d-flex col-md-12">
                            <div class="col-md-4" style="margin-right: 5px">
                                <label for="prioridade-${id}" class="form-label">Prioridade da solicitação ${id}:</label>
                                <select name="prioridade[${id}]" id="prioridade-${id}" class="form-select select2">
                                    @for ($i = 1; $i <= 100; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="setor-${id}" class="form-label">Setor responsável:</label>
                                <select name="setor[${id}]" id="setor-${id}" class="form-select select2">
                                    @foreach ($todosSetor as $setor)
                                        <option value="{{ $setor->id }}">{{ $setor->nome }} - {{ $setor->sigla}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    `;
                    // Adiciona o novo conteúdo ao corpo da modal
                    $('#modal-body-content').append(newContent);
                });
            });

            // Ação para aprovar em lote
            $('#btnAprovarLote').on('click', function() {
                const ids = [];
                const prioridades = {};
                const setores = {};

                // Coleta os IDs, prioridades e setores
                $('.item-checkbox:checked').each(function() {
                    const id = $(this).val();
                    ids.push(id); // Adiciona ID ao array

                    // Captura as prioridades e setores correspondentes
                    prioridades[id] = $(`#prioridade-${id}`).val();
                    setores[id] = $(`#setor-${id}`).val();
                });

                // Envia os dados via AJAX
                $.ajax({
                    type: "POST",
                    url: "{{ route('aquisicao.aprovarEmLote') }}",
                    data: {
                        ids: ids,
                        prioridade: prioridades,
                        setor: setores,
                        _token: '{{ csrf_token() }}' // Inclui o token CSRF
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            alert('Solicitações aprovadas com sucesso');
                            location.reload(); // Atualiza a página
                        } else {
                            alert(response.message || 'Erro ao aprovar solicitações');
                        }
                    },
                    error: function() {
                        alert('Erro ao aprovar solicitações');
                    }
                });
            });

            $('.btn-danger[data-bs-dismiss="modal"]').on('click', function() {
                // Recarrega a página ao clicar no botão de cancelar
                location.reload();
            });
        });
    </script>
@endsection
