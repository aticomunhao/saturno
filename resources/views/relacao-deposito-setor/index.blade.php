@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header" style="color:blue">Gerenciar Relação Depósito/Setor</h5>
            <div class="card-body">
                <p class="card-text">
                <div class="row justify-content-beteween">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-3">
                        <a href="{{r}}"><button class="btn btn-success" style="width: 100%">Novo</button></a> 
                    </div>
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered border-secondary table-hover align-middle">
                    <thead>
                        <tr style="background-color: #d6e3ff; font-size:14px; color:#000000">
                            <th scope="col">Deposito</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">ATI</th>
                            <td>Deposito 01</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection
