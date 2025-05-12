@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Solicitar Teste de Material
            </div>
            <div class="card-body">
                <div class="card-text">
                    <form action="{{ route('movimentacao-fisica.solicitar-teste.create') }}" method="POST">
                        @csrf
                        <label for="materiais">Selecione Os Materiais</label>
                        <select name="materiais[]" id="materiais" class="form-control" multiple>
                            @foreach ($cadastro_inicial as $material)
                                <option value="{{ $material->id }}">{{ $material->ItemCatalogoMaterial->nome }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Solicitar Teste</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
