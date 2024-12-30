@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Conta Contábil</h1>

    <form action="{{ route('conta-contabil.update', $contaContabil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="data_inicio">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $contaContabil->data_inicio }}" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $contaContabil->data_fim }}">
        </div>

        <div class="form-group">
            <label for="id_tipo_catalogo">Tipo de Catálogo</label>
            <input type="number" name="id_tipo_catalogo" id="id_tipo_catalogo" class="form-control" value="{{ $contaContabil->id_tipo_catalogo }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $contaContabil->descricao }}" required>
        </div>

        <div class="form-group">
            <label for="id_tipo_natureza_conta_contabil">Natureza Contábil</label>
            <input type="number" name="id_tipo_natureza_conta_contabil" id="id_tipo_natureza_conta_contabil" class="form-control" value="{{ $contaContabil->id_tipo_natureza_conta_contabil }}" required>
        </div>

        <div class="form-group">
            <label for="id_tipo_grupo_conta_contabil">Grupo Contábil</label>
            <input type="number" name="id_tipo_grupo_conta_contabil" id="id_tipo_grupo_conta_contabil" class="form-control" value="{{ $contaContabil->id_tipo_grupo_conta_contabil }}" required>
        </div>

        <div class="form-group">
            <label for="id_tipo_classe_conta_contabil">Classe Contábil</label>
            <input type="number" name="id_tipo_classe_conta_contabil" id="id_tipo_classe_conta_contabil" class="form-control" value="{{ $contaContabil->id_tipo_classe_conta_contabil }}" required>
        </div>

        <div id="dynamic-fields">
            @for ($i = 1; $i <= $contaContabil->grau; $i++)
                <div class="col-md-2 col-sm-12 form-group">
                    <label for="select-{{ $i }}">Selecione um número:</label>
                    <div class="input-group">
                        <select name="nivel_{{ $i }}" id="select-{{ $i }}" class="form-control dynamic-select">
                            <option value="">Selecione</option>
                            @for ($j = 1; $j <= 99; $j++)
                                <option value="{{ $j }}" {{ $contaContabil->{'nivel_'.$i} == $j ? 'selected' : '' }}>{{ $j }}</option>
                            @endfor
                        </select>
                        @if ($i > 1)
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary remove-field">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            @endfor
        </div>

        <div class="form-group">
            <label for="grau">Grau</label>
            <input type="number" name="grau" id="grau" class="form-control" value="{{ $contaContabil->grau }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script>
$(document).ready(function() {
    var selectCount = parseInt($('#grau').val()) || 1; // Inicia com o valor de grau ou 1
    $('#grau').val(selectCount);

    // Função para adicionar selects com base no grau inicial
    function addInitialSelects(count) {
        for (var i = 2; i <= count; i++) {
            var newSelect = `
                <div class="col-md-2 col-sm-12 form-group">
                    <label for="select-${i}">Selecione um número:</label>
                    <div class="input-group">
                        <select name="nivel_${i}" id="select-${i}" class="form-control dynamic-select">
                            <option value="">Selecione</option>
                            @for ($j = 1; $j <= 99; $j++)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endfor
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary remove-field">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#dynamic-fields').append(newSelect);
        }
    }

    // Adiciona os selects iniciais com base no grau
    addInitialSelects(selectCount);

    $(document).on('change', '.dynamic-select', function() {
        var selectedValue = $(this).val();
        if (selectedValue && selectCount < 6) {
            selectCount++;
            $('#grau').val(selectCount);
            var newSelect = `
                <div class="col-md-2 col-sm-12 form-group">
                    <label for="select-${selectCount}">Selecione um número:</label>
                    <div class="input-group">
                        <select name="nivel_${selectCount}" id="select-${selectCount}" class="form-control dynamic-select">
                            <option value="">Selecione</option>
                            @for ($j = 1; $j <= 99; $j++)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endfor
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary remove-field">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#dynamic-fields').append(newSelect);
        }
    });

    $(document).on('click', '.remove-field', function() {
        $(this).closest('.col-md-2').remove();
        if (selectCount > 1) {
            selectCount--;
        }
        $('#grau').val(selectCount);
    });
});
</script>
@endsection
