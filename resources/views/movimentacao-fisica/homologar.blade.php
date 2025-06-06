@extends('layouts.app')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo150px.ico') }}"
                                        height="100" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <!-- <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4> -->
                                <!-- <p class="text-muted text-center">Sign in to continue to Lexa.</p> -->
                                <form method="POST" class="form-horizontal mt-4" action="{{ route('movimentacao-fisica.solicitar-teste.create') }}">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <p>{{ $errors->first() }}</p>
                                        </div>
                                    @endif
                                    @foreach ($materiais_enviados as $material)
                                        <input type="hidden" name="materiais_enviados[]" value="{{ $material }}">
                                    @endforeach

                                    <div class="form-group">
                                        <label for="username">CPF</label>
                                        <!--<input id="cpf" type="numeric" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus placeholder="">-->
                                        <input id="cpf" type="numeric"
                                            class="form-control mascara_cpf @error('cpf') is-invalid @enderror"
                                            name="cpf" placeholder="Ex.: 000.000.000-00" value="{{ old('cpf') }}">
                                        @error('cpf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>

                                    </div>
                                    <label for="userpassword">Senha</label>
                                    <div class="input-group">
                                        <input id="senha" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="senha"
                                            required autocomplete="current-password" placeholder="">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button class="btn btn-primary bi bi-eye" type="button" id="buttonEye"></button>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            {{-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customControlInline">{{ __('Remember Me') }}</label>
                                            </div> --}}
                                        </div>
                                        <div class="col-12 d-grid gap-2" style="text-align:center;">
                                            <button class="btn btn-primary w-md waves-effect waves-light btn-block"
                                                type="submit">Entrar</button>
                                        </div>
                                        {{-- <div class="form-group mb-0 row">
                                            <div class="col-12 mt-3">
                                                <a href="#" class="text-danger" type="button"><i class="mdi mdi-lock"></i>Esqueci minha senha</a>
                                            </div>
                                        </div> --}}
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <!-- <p>Don't have an account ? <a href="/register" class="text-primary"> Signup Now </a></p> -->
                        <!-- <p>© {{ date('Y', strtotime('-2 year')) }} - {{ date('Y') }} Comunhão Espírita de Brasília <i class="mdi mdi-heart text-danger"></i></p> -->
                        <p>© Comunhão Espírita de Brasília <i class="mdi mdi-heart text-danger"></i></p>
                    </div>
                    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
                    <script>
                        $("#buttonEye").click(function() {
                            $("#buttonEye").toggleClass("bi-eye");
                            $("#buttonEye").toggleClass("bi-eye-slash");
                            if ($('#senha').attr('type') == "password") {
                                $("#senha").attr("type", "text");
                            } else {
                                $("#senha").attr("type", "password");
                            }
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
