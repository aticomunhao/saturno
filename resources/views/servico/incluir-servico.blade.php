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
                            
                        </form>{{-- Final Formulario de Inserção --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
