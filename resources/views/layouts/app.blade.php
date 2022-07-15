<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header class="py-3 mb-4">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use href="{{ url('/') }}"/></svg>
                    <span class="fs-4">LOGO</span>
                </a>
            </div>
        </header>
        @php 
            $categories = \App\Models\Category::all();
        @endphp
        <nav class="py-2 bg-light border-bottom">
            <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark px-2 active" aria-current="page">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link link-dark px-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Разделы
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li class="dropdown-item"><a href="{{ route('categories.show_by_slug', $category->slug) }}" class="link-dark">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="nav">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">{{ __('Login') }}</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-dark px-2">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
