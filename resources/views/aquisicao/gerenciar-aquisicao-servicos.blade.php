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
                                        <select class="js-example-responsive form-select"
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
                                        <select class="js-example-responsive form-select" style="border: 1px solid #999999;"
                                            id="servicos" name="servicos" value="{{ old('servicos') }}" disabled>
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
                                        <a href="/gerenciar-aquisicao-servicos" type="button" class="btn btn-light btn-sm"
                                            style="box-shadow: 1px 2px 5px #000000; font-size: 1rem"
                                            value="">Limpar</a>
                                        <button class="btn btn-light btn-sm "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-left:5px;"{{-- Botao submit do formulario de pesquisa --}}
                                            type="submit">Pesquisar
                                        </button>
                                        <a href="/incluir-aquisicao-servicos"  class="btn btn-success"
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-left:5px">
                                            Novo+
                                        </a>
                                    </div>
                                </div>
                                <div class="ROW justify-content-start">
                                    <div class="col-12" style="margin-top:10px;">
                                        <a href="/incluir-aquisicao-servicos"  class="btn btn-primary "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px">
                                            Aprovar em Lote
                                        </a>
                                        <a href="/incluir-aquisicao-servicos" class="btn btn-success "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px">
                                            Homologar em Lote
                                        </a>
                                        <a href="/incluir-aquisicao-servicos"  class="btn btn-warning "
                                            style="font-size: 1rem; box-shadow: 1px 2px 5px #000000; margin-right:5px">
                                            Confirmar em Lote
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <table {{-- Inicio da tabela de informacoes --}}
                                class= "table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                                <thead style="text-align: center; ">{{-- inicio header tabela --}}
                                    <tr style="background-color: #d6e3ff; font-size:19px; color:#000;" class="align-middle">
                                        <th></th>
                                        <th>Número</th>
                                        <th>Data</th>
                                        <th>Tipo Serviço</th>
                                        <th>Setor</th>
                                        <th>Prioridade</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>{{-- Fim do header da tabela --}}
                                <tbody style="font-size: 15px; color:#000000; text-align: center;">{{-- Inicio body tabela --}}
                                    @foreach ($aquisicao as $aquisicaos)
                                        <tr>
                                            <td></td>
                                            <td>{{ $aquisicaos->id }}</td>
                                            <td>{{ $aquisicaos->data }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </form>{{-- Final Formulario de pesquisa --}}
    <script>
        $(document).ready(function() {
            $('#servicos, #classeServico').select2({
                theme: 'bootstrap-5',
                width: '100%',
            });

            // Função para popular o select de serviços baseado no valor do select de classe de serviço
            function populateServicos(selectElement, classeServicoValue) {
                $.ajax({
                    type: "GET",
                    url: "/retorna-nome-servicos/" + classeServicoValue,
                    dataType: "json",
                    success: function(response) {
                        // Limpa o select antes de adicionar novas opções
                        selectElement.empty();

                        // Adiciona um option padrão
                        selectElement.append('<option value="">Selecione um serviço</option>');

                        // Itera sobre os dados retornados e adiciona as opções ao select
                        $.each(response, function(index, item) {
                            selectElement.append('<option value="' + item.id + '">' +
                                item.descricao + '</option>');
                        });

                        // Ativa o select caso ele estivesse desabilitado
                        selectElement.prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Ocorreu um erro:", error);
                        console.log(xhr.responseText); // Detalhes do erro, se necessário
                    }
                });
            }

            // Evento change para detectar a mudança no select de classe de serviço
            $('#classeServico').change(function() {
                var classeServicoValue = $(this).val();

                // Selecione o elemento do select de serviços
                var servicosSelect = $('#servicos');

                // Desabilita o select de serviços se nenhum valor for selecionado na classe de serviço
                if (!classeServicoValue) {
                    servicosSelect.empty().append('<option value="">Selecione um serviço</option>');
                    servicosSelect.prop('disabled', true);
                    return;
                }

                // Chama a função para popular os serviços
                populateServicos(servicosSelect, classeServicoValue);
            });
        });
    </script>
@endsection
