@extends('layouts.app')

@section('title')
    Aprovar Aquisição de Serviços
@endsection
@section('content')
    <form method="POST" action="/validaAprovacao-aquisicao-servicos/{{ $aquisicao->idSolicitacao }}">{{-- Formulario de Inserção --}}
        @csrf
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Aprovar Aquisição de Serviços
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Identificação do Solicitante</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Número da Proposta</label>
                                    <br>
                                    <input class="form-control" style="text-align: center;" type="text" disabled
                                        value="{{ $aquisicao->idSolicitacao }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Data da Criação</label>
                                    <br>
                                    <input class="form-control" style="text-align: center;" type="date" format="d-m-Y"
                                        disabled value="{{ $aquisicao->dataSolicitacao }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Setor</label>
                                    <br>
                                    <input class="form-control" style="text-align: center;" type="text" disabled
                                        value="{{ $buscaSetor->nomeSetor }}">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h5>Identificação do Serviço</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Tipo</label>
                                    <br>
                                    <input class="form-control" style="text-align: center;" type="text" disabled
                                        value="{{ $aquisicao->descricaoCatalogo }}">
                                </div>
                                <div class="col-md-3">
                                    <label>Data da Criação</label>
                                    <br>
                                    <input class="form-control" style="text-align: center;" type="text" disabled
                                        value="{{ $aquisicao->descricaoCatalogo }}">
                                </div>
                                <div class="col-md-2">
                                    <label>Prioridade</label>
                                    <br>
                                    <select id="cargoSelect" class="form-select status select2 pesquisa-select"
                                        style="" name="prioridade" required>
                                        @foreach ($numeros as $number)
                                            <option value="{{ $number }}">{{ $number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Setor Responsável por Acompanhar</label>
                                    <br>
                                    <select id="cargoSelect" class="form-select status select2 pesquisa-select"
                                        style="" name="setorResponsavel" required>
                                        @foreach ($todosSetor as $todosSetores)
                                            <option value="{{ $todosSetores->id }}">{{ $todosSetores->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" col-12">Motivo
                                <br>
                                <textarea class="form-control" style="border: 1px solid #999999; padding: 5px;" id="idmotivo" rows="4"
                                    value="" disabled>{{ $aquisicao->motivoServico }}</textarea>
                            </div>
                            <br>
                            <hr>
                            <h5>Propostas Comerciais</h5>
                            <div class="ROW" style="margin-left:5px">
                                @foreach ($empresas as $index => $empresa)
                                    <div style="display: flex; gap: 20px; align-items: flex-end;">
                                        <div class="col-md-3">{{ 0 + 1 }}º Empresa (ID:
                                            {{ $empresa->id_empresa }})
                                            <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                                type="text" name="empresas[{{ $index }}][id_empresa]"
                                                value="{{ $empresa->id_empresa }}" readonly>
                                        </div>
                                        <div class="col-md-3">Valor Orçado
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="border: 1px solid #999999; padding: 5px;">R$</span>
                                                <input type="text" class="form-control"
                                                    name="empresas[{{ $index }}][valor]"
                                                    style="border: 1px solid #999999; padding: 5px;"
                                                    value="{{ $empresa->valor }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">Data Limite do Orçamento
                                            <input class="form-control" style="border: 1px solid #999999; padding: 5px;"
                                                type="date" name="empresas[{{ $index }}][dt_validade]"
                                                value="{{ $empresa->dt_validade }}" readonly>
                                        </div>
                                        <div class="col-md-3">Arquivo da Proposta
                                            <a href="{{ $empresa->end_arquivo }}" target="_blank">Ver Arquivo</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <hr>
                            <h5>Decisão</h5>

                            <input type="hidden" name="solicitacao_id" value="{{ $aquisicao->idSolicitacao }}">

                            <div class="d-flex gap-5 align-items-end">
                                <div class="form-check">
                                    <input type="radio" name="status" id="radioDevolver" value="1">
                                    <label for="radioDevolver">Devolver</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" id="radioAprovar" value="3" checked>
                                    <label for="radioAprovar">Aprovar</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" id="radioCancelar" value="7">
                                    <label for="radioCancelar">Cancelar</label>
                                </div>
                            </div>
                            <div class=" col-12">Motivo
                                <br>
                                <textarea class="form-control" style="border: 1px solid #999999;" id="idMotivo" rows="4" name="motivo"
                                    value="" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="botões">
            <a href="/gerenciar-aquisicao-servicos" type="button" value=""
                class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
            <input type="submit" value="Confirmar" class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">
        </div>
    </form>{{-- Final Formulario de Inserção --}}
    <script>
        $(document).ready(function() {

            //Importa o select2 com tema do Bootstrap para a classe "select2"
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

        });
    </script>
@endsection
