<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Logbook') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/sidebutton.js'])
</head>
<body id="body-pd">
    <!--Container Main end-->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Logbook') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="bi bi-person-circle"></i>
                                  {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @if(!request()->is('login') && !request()->is('register'))
            <div>
                <div class="sidebar p-4 bg-secondary" id="sidebar">
                    <h4 class="mb-5 text-white">{{ config('app.name', 'Logbook') }}</h4>
                    <li class="mb-2">
                        <a class="text-white fs-5" href="{{ route('home') }}">
                            <i class="bi bi-house mr-2 fs-5"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="text-white fs-5" href="{{ route('users.index') }}">
                        <i class="bi bi-person-lines-fill fs-5"></i>
                            Users
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="text-white fs-5" href="{{ route('transaksi.index') }}">
                            <i class="bi bi-bag-check fs-5"></i>
                            Transaction
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="text-white fs-5" href="{{ route('lacak.index') }}">
                            <i class="bi bi-search fs-5"></i>
                            Lacak
                        </a>
                    </li>
                </div>
            </div>
            <div class="p-4" id="main-content">
                <button class="btn btn-secondary" id="button-toggle">
                    <i class="bi bi-list"></i>
                </button>
                <main id="main-content" class="py-4">
                @yield('content')
                </main>
            </div>
        @else
        <div class="p-4" id="main-content">
                <main id="main-content" class="py-4">
                @yield('content')
                </main>
            </div>
        @endif
    </div>
</body>
</html>
