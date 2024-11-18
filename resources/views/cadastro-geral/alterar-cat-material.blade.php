@extends('layouts.app')

@section('title')
    Incluir de Empresa
@endsection
@section('content')
    <form class="form-horizontal mt-4" method="POST" action="cad-cat-material/atualizar/{{ $resultCatMaterial[0]->id }}">
        @csrf
        @method('PUT')
        <div class="container-fluid"> {{-- Container completo da página  --}}
            <div class="justify-content-center">
                <div class="col-12">
                    <br>
                    <div class="card" style="border-color: #355089;">
                        <div class="card-header">
                            <div class="ROW">
                                <h5 class="col-12" style="color: #355089">
                                    Categoria do Material
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" value="{{ $resultCatMaterial[0]->nome }}"
                                            name="categoria" id="categoria" required
                                            oninvalid="this.setCustomValidity('Campo requerido')">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6 mt-3" style="text-align: right;">
                                    <button type="submit" class="btn btn-success">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
