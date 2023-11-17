<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body style="background-color: #e0e0e0d0" class="user-select-none">
    <div class="d-flex justify-content-center align-items-center">
        <h4>Espace Professeurs - M. {{ Auth::user()->name }}</h4>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/prof"><i class="bi bi-house"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prof') ? 'active' : '' }}" href="/prof">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prof/appel') ? 'active' : '' }}"
                            href="/prof/appel">Appel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prof/devoir') ? 'active' : '' }}"
                            href="/prof/devoir">Devoir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prof/note*') ? 'active' : '' }}"
                            href="{{ route('note.create') }}">Note</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Autres
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/">Espace Élève</a></li>
                            <li><a class="dropdown-item" href="#">Espace Vie Scolaire</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        @if (session('success'))
            @include('shared.alert', [
                'type' => 'success',
                'slot' => session('success'),
            ])
        @endif
        @yield('content')
    </div>
</body>

</html>
