@extends('layouts.app')

@section('title')
    Incluir Serviços no Catálogo
@endsection
@section('content')
    <div class="container-fluid"> {{-- Container completo da página  --}}
        <div class="justify-content-center">
            <div class="col-12">
                <br>
                <div class="card" style="border-color: #355089;">
                    <div class="card-header">
                        <div class="ROW">
                            <h5 class="col-12" style="color: #355089">
                                Incluir Serviços no Catálogo
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/salvar-servico">{{-- Formulario de Inserção --}}
                            @csrf
                            <!-- Botão para alternar entre select e input -->
                            <div class="form-group mt-3">
                                <button type="button" class="btn btn-secondary" id="toggleButton" style="margin-bottom: 5px">Usar Classe Existente</button>
                            </div>
                            {{-- Selecione a classe de serviço ou crie uma nova --}}
                            <div class="form-group col-md-4" id="classeServicoContainer">
                                <label for="classe_servico">Classe de Serviço</label>
                                <select class="form-control select2" id="classe_servico" name="classe_servico">
                                    <option value="">Selecione uma Classe</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}">{{ $classe->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group d-none col-md-4" id="novaClasseContainer">
                                <label for="nova_classe_servico">Nova Classe de Serviço</label>
                                <input type="text" class="form-control" id="nova_classe_servico" style="background-color: white"
                                    name="nova_classe_servico" placeholder="Digite a nova classe de serviço">
                            </div>





                            <div class="botões">
                                <a href="/catalogo-servico" type="button" value=""
                                    class="btn btn-danger col-md-3 col-2 mt-4 offset-md-2">Cancelar</a>
                                <button type="submit" value="Confirmar"
                                    class="btn btn-primary col-md-3 col-1 mt-4 offset-md-2">Confirmar
                                </button>
                            </div>
                        </form>{{-- Final Formulario de Inserção --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleButton');
            const classeServicoContainer = document.getElementById('classeServicoContainer');
            const novaClasseContainer = document.getElementById('novaClasseContainer');
            const classeServicoSelect = document.getElementById('classe_servico');
            const novaClasseInput = document.getElementById('nova_classe_servico');

            toggleButton.addEventListener('click', function() {
                if (classeServicoContainer.classList.contains('d-none')) {
                    // Se o select de classe está oculto, mostrá-lo e esconder o campo de nova classe
                    classeServicoContainer.classList.remove('d-none');
                    novaClasseContainer.classList.add('d-none');
                    novaClasseInput.value = ''; // Limpa o input de nova classe
                    toggleButton.textContent = 'Usar Classe Existente';
                } else {
                    // Se o select de classe está visível, ocultá-lo e mostrar o campo de nova classe
                    classeServicoContainer.classList.add('d-none');
                    novaClasseContainer.classList.remove('d-none');
                    classeServicoSelect.value = ''; // Limpa o select de classe
                    toggleButton.textContent = 'Adicionar Nova Classe';
                }
            });
        });
    </script>
@endsection
