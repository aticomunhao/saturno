@extends('layouts.app')

@section('title')
    Editar Serviços no Catálogo
@endsection

@section('content')
    <div class="container-fluid"> {{-- Container completo da página --}}
        <div class="justify-content-center">
            <div class="col-12">
                <br>
                <div class="card" style="border-color: #355089;">
                    <div class="card-header">
                        <div class="row">
                            <h5 class="col-12" style="color: #355089">
                                Editar Serviços no Catálogo
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/atualizar-servico/{{ $servico->id }}">{{-- Formulario de Inserção --}}
                            @csrf
                            {{-- Selecione a classe de serviço ou crie uma nova --}}
                            <div class="row">
                                <div class="form-group col-md-4" id="classeServicoContainer">
                                    <label for="classe_servico">Alterar Nome da Classe</label>
                                    <select class="form-control select2" id="classe_servico"
                                        style="border: 1px solid #999999; padding: 5px;" name="classe_servico">
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}"
                                                {{ $classe->id == $classeSelecionada->id ? 'selected' : '' }}>
                                                {{ $classe->descricao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-12">Situação da Classe
                                    <br>
                                    <select class="form-control form-select" id="classeSituacao"
                                        style="border: 1px solid #999999; padding: 5px;" name="classeSituacao" required>
                                        <option value="1" {{ $classeSelecionada->situacao == true ? 'selected' : '' }}>
                                            Ativo
                                        </option>
                                        <option value="0"
                                            {{ $classeSelecionada->situacao == false ? 'selected' : '' }}>Inativo
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="dt_inicial">Alterar Nome do Serviço</label>
                                    <input type="text" class="form-control" name="nomeServico"
                                        style="border: 1px solid #999999; padding: 5px;background-color:white"
                                        placeholder="Digite o nome do serviço" value="{{ $servico->descricao }}" required>
                                </div>
                                <div class="col-md-2 col-sm-12">Situação do Serviço
                                    <br>
                                    <select class="form-control form-select" id="servicoSituacao"
                                        style="border: 1px solid #999999; padding: 5px;" name="servicoSituacao" required>
                                        <option value="1" {{ $servico->situacao == true ? 'selected' : '' }}>Ativo
                                        </option>
                                        <option value="0" {{ $servico->situacao == false ? 'selected' : '' }}>Inativo
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="botões">
                                <a href="/catalogo-servico" type="button" value=""
                                    class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
                                <button type="submit" value="Confirmar"
                                    class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2"
                                    onclick="return confirmInactivation();">Confirmar
                                </button>
                            </div>
                        </form>{{-- Final Formulario de Inserção --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmInactivation() {
            const classeSituacao = document.getElementById('classeSituacao').value;
            const servicoSituacao = document.getElementById('servicoSituacao').value;

            if (classeSituacao == '0' && servicoSituacao == '0') { // Inativa classe e serviço
                return confirm('Deseja realmente inativar essa classe e todos os serviços associados?');
            } else if (classeSituacao == '0') { // Apenas inativa a classe
                return confirm('Deseja realmente inativar essa classe? Todos os serviços associados também serão inativados.');
            } else if (servicoSituacao == '0') { // Apenas inativa o serviço
                return confirm('Deseja realmente inativar esse serviço?');
            }
            return true; // Se não for inativar, envia o formulário normalmente
        }
    </script>
@endsection
