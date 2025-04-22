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
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Termo de Doação
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="row" style="margin-left:5px">
                                <!-- Botão Adicionar Material à direita -->
                                <div>
                                    <button type="button" class="btn btn-success" id="addMaterial" data-bs-toggle="modal"
                                        data-bs-target="#modalIncluirMaterial">
                                        Adicionar Material
                                    </button>
                                </div>
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
    <!-- Modal Incluir Material -->
    <div class="modal fade" id="modalIncluirMaterial" tabindex="-1" aria-labelledby="modalIncluirMaterialLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            {{-- <form class="form-horizontal" method="POST"
                action="{{ url('/incluir-material-doacao-cadastro-inicial/' . $idSolicitacao) }}"> --}}
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
    <script>
         $(document).ready(function() {
            // Inicializa o Select2 dentro dos modais
            $('#modalIncluirMaterial').on('shown.bs.modal', function() {
                $('.select2').select2({
                    dropdownParent: $(this)
                });
            });

            // Recarrega a página ao cancelar no modal
            $('.btn-danger[data-bs-dismiss="modal"]').on('click', function() {
                location.reload();
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
