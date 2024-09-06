<?php $acesso = session()->get('usuario.acesso');
$setor = session()->get('usuario.setor');
?>

<div id="app" class="row">
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm"
        style="background-color:#3891e4; font-family:tahoma; font-weight:bold;">
        <div class="container">
            <a class="navbar-brand" style="color: #fff;" href="{{ url('/login/valida') }}">Saturno</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation" style="border:none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                {{-- @if (in_array(38, $setor) or in_array(25, $setor)) --}}
                <ul class="navbar-nav" id="AME">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Aquisição</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">


                            {{-- @if (in_array(13, $acesso) or in_array(14, $acesso)) --}}
                            <li><a class="dropdown-item" href="/gerenciar-aquisicao-servicos">Serviços</a>
                            </li>
                            {{-- @endif --}}
                            <li><a class="dropdown-item" href="/gerenciar-aquisicao-material">Material</a>
                            </li>

                        </ul>
                    </li>
                </ul>
                {{-- @endif
                @if (in_array(7, $setor) or in_array(25, $setor)) --}}
                <ul class="navbar-nav" id="DAO">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Cadastrar</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

                            {{-- @if (in_array(13, $acesso) or in_array(14, $acesso)) --}}
                            <li><a class="dropdown-item" href="{{route('gerenciar-documentos')}}">Documentos</a>
                            </li>
                            {{-- @endif --}}
                        </ul>
                    </li>
                </ul>
                {{-- @endif --}}
                {{-- @if (in_array(6, $setor) or in_array(25, $setor)) --}}
                <ul class="navbar-nav" id="DAE">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Catálogos</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            {{-- @if (in_array(13, $acesso) or in_array(14, $acesso)) --}}
                            <li><a class="dropdown-item" href="/catalogo-empresa">Catálogo de Empresas</a>
                            </li>
                            <li><a class="dropdown-item" href="/catalogo-material">Catálogo de Materiais</a>
                            </li>
                            <li><a class="dropdown-item" href="/catalogo-servico">Catálogo de Serviços</a>
                            </li>
                            <li><a class="dropdown-item" href="/catalogo-conta">Catálogo de Contas</a>
                            </li>
                            {{-- @endif --}}
                        </ul>
                    </li>
                </ul>
                {{-- @endif --}}

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="3" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Administrar sistema</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            {{-- @if (in_array(2, $acesso)) --}}
                            <li><a class="dropdown-item" href="/gerenciar-fatos">Gerenciar Fatos</a></li>
                            {{-- @endif --}}
                            {{-- @if (in_array(1, $acesso)) --}}
                            <li><a class="dropdown-item" href="/gerenciar-perfis">Gerenciar Perfis</a></li>
                            {{-- @endif
                                @if (in_array(27, $acesso)) --}}
                            <li><a class="dropdown-item" href="/gerenciar-usuario">Gerenciar Usuários</a></li>
                            {{-- @endif
                                @if (in_array(28, $acesso)) --}}
                            <li><a class="dropdown-item" href="/gerenciar-versoes">Gerenciar Versões</a></li>
                            {{-- @endif --}}

                        </ul>
                    </li>
                </ul>

                <div class="col">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="4" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Logout</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="/usuario/alterar-senha"><i
                                            class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle mr-1"></i>Alterar
                                        Senha</a></li>
                                <li><a class="dropdown-item" href="javascript:void();"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i>
                                        {{ __('Sair') }}</a></li>
                                <form id="logout-form" action="{{ route('login') }}" method="any"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/js/bootstrap5-toggle.ecmas.min.js"></script>
<script>
    if ($('#ADM .dropdown-item').length == 0) {
        $('#ADM').hide();
    }
</script>
