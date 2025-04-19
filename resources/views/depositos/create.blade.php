@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Novo Depósito
            </div>
            <div class="card-body">
                <br>
                <form action="" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
