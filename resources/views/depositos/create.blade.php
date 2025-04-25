@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Novo Depósito
            </div>
            <div class="card-body">
                <form action="{{ route('deposito.store') }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-4">
                        <!-- Nome -->
                        <div class="col-12 col-md-3">
                            <label for="id_nome">Nome do Depósito</label>
                            <input type="text" name="nome" id="id_nome"
                                class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Depósito"
                                value="{{ old('nome') }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sigla -->
                        <div class="col-12 col-md-2">
                            <label for="id_sigla">Sigla</label>
                            <input type="text" name="sigla" id="id_sigla"
                                class="form-control @error('sigla') is-invalid @enderror" placeholder="Ex: DEP-01"
                                value="{{ old('sigla') }}" required>
                            @error('sigla')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo Depósito -->
                        <div class="col-12 col-md-3">
                            <label for="id_tipo_deposito">Tipo</label>
                            <select name="tipo_deposito" id="id_tipo_deposito"
                                class="form-control @error('tipo_deposito') is-invalid @enderror" required>
                                @foreach ($tipo_deposito as $tipo)
                                    <option value="{{ $tipo->id }}"
                                        {{ old('tipo_deposito') == $tipo->id ? 'selected' : '' }}>
                                        {{ $tipo->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tipo_deposito')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sala -->
                        <div class="col-12 col-md-3">
                            <label for="id_sala">Sala</label>
                            <select name="sala" id="id_sala" class="form-control @error('sala') is-invalid @enderror"
                                required>
                                @foreach ($sala as $s)
                                    <option value="{{ $s->id }}" {{ old('sala') == $s->id ? 'selected' : '' }}>
                                        {{ $s->nome }} - {{ $s->numero }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sala')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <!-- Comprimento -->
                        <div class="col-12 col-md-2">
                            <label for="id_comprimento">Comprimento (m)</label>
                            <input type="text" name="comprimento" id="id_comprimento"
                                class="form-control @error('comprimento') is-invalid @enderror" placeholder="Ex: 2,50"
                                value="{{ old('comprimento') }}" pattern="^\d+([,]\d{1,2})?$"
                                title="Use vírgula como decimal (ex: 2,50)" required>
                            @error('comprimento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Largura -->
                        <div class="col-12 col-md-2">
                            <label for="id_largura">Largura (m)</label>
                            <input type="text" name="largura" id="id_largura"
                                class="form-control @error('largura') is-invalid @enderror" placeholder="Ex: 1,75"
                                value="{{ old('largura') }}" pattern="^\d+([,]\d{1,2})?$" required>
                            @error('largura')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Altura -->
                        <div class="col-12 col-md-2">
                            <label for="id_altura">Altura (m)</label>
                            <input type="text" name="altura" id="id_altura"
                                class="form-control @error('altura') is-invalid @enderror" placeholder="Ex: 3,00"
                                value="{{ old('altura') }}" pattern="^\d+([,]\d{1,2})?$" required>
                            @error('altura')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Largura Porta -->
                        <div class="col-12 col-md-2">
                            <label for="id_largura_porta">Largura Porta (m)</label>
                            <input type="text" name="largura_porta" id="id_largura_porta"
                                class="form-control @error('largura_porta') is-invalid @enderror" placeholder="Ex: 0,90"
                                value="{{ old('largura_porta') }}" pattern="^\d+([,]\d{1,2})?$" required>
                            @error('largura_porta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Altura Porta -->
                        <div class="col-12 col-md-2">
                            <label for="id_altura_porta">Altura Porta (m)</label>
                            <input type="text" name="altura_porta" id="id_altura_porta"
                                class="form-control @error('altura_porta') is-invalid @enderror" placeholder="Ex: 2,10"
                                value="{{ old('altura_porta') }}" pattern="^\d+([,]\d{1,2})?$" required>
                            @error('altura_porta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="id_capacidade">Capacidade Sala</label>
                            <input type="text" name="capacidade" id="id_capacidade"
                                class="form-control @error('capacidade') is-invalid @enderror" placeholder="Ex: 2,10"
                                value="{{ old('capacidade') }}" pattern="^\d+([,]\d{1,2})?$" required readonly>
                            @error('altura_porta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 justify-content-around">
                        <div class="col-12 col-md-3">
                            <button type="button" class="btn btn-danger w-100" onclick="window.history.back()">
                                Cancelar
                            </button>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                Confirmar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Função para calcular a capacidade
            function calcularCapacidade() {
                var comprimento = parseFloat($('#id_comprimento').val().replace(',', '.'));
                var largura = parseFloat($('#id_largura').val().replace(',', '.'));
                var altura = parseFloat($('#id_altura').val().replace(',', '.'));

                if (!isNaN(comprimento) && !isNaN(largura) && !isNaN(altura)) {
                    var capacidade = comprimento * largura * altura;
                    $('#id_capacidade').val(capacidade.toFixed(2).replace('.', ','));
                } else {
                    $('#id_capacidade').val('');
                }
            }

            // Adiciona o evento de input para os campos de dimensão
            $('#id_comprimento, #id_largura, #id_altura').on('input', calcularCapacidade);
        });
    </script>
@endsection
