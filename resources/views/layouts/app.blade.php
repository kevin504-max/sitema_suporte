<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        {{-- Font Awesome --}}
        <link  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <a class="navbar-brand" style="font-size: 1.7em" href="{{ url('/') }}">
                            Proconsult Engenharia
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" id="navbarSupportedContent">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link mr-3">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Meu Perfil</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            @if(Auth::check() && Auth::user()->role_as == 1)
                <div class="container py-2">
                    <a class="btn btn-outline-secondary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fa fa-bars"></i>
                    </a>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <div class="mb-3">
                                <strong>Dashboard de Gerenciamento de Conteúdo</strong>
                            </div>

                            <div>
                                <ul class="nav flex-column" style="font-size: 1.2rem;">
                                    <li class="nav-item mb-2">
                                        <a href="{{ route('dashboard.users.index') }}" class="nav-link text-secondary"><i class="fa fa-users"></i> Usuários</a>
                                    </li>
                                    <li class="nav-item mb-2 ">
                                        <a href="{{ route('dashboard.subjects.index') }}" class="nav-link text-secondary"><i class="fa fa-list"></i> Assuntos</a>
                                    </li>
                                    <li class="nav-item mb-2 ">
                                        <a href="#" class="nav-link text-secondary"><i class="fa fa-handshake"></i> Chamados</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            @endif

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        @yield('modals')

        {{-- Scripts --}}
        @livewireScripts

        <script src="{{ asset('frontend/js/jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session("status"))
            <script>
                Swal.fire({
                    title: "{{ session("message") }}",
                    icon: "{{ session("status") }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        @yield('scripts')

    </body>
</html>
