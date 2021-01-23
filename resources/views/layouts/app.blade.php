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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
          <div class="container">
            <div class="row">
              @auth
                <div class="col-md-3">
                  <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                      <a class="nav-link pl-0 active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-0" href="#">Employee Management</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-0" href="#">System Management</a>
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- Country</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- State</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- City</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- Department</a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-0" href="#">User Management</a>
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- User</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- Role</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link small text-muted pt-0 pb-2" href="#">- Permission</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>

                <div class="col-md-9">
              @endauth

              @guest
                <div class="col-md-12">
              @endguest
                @yield('content')
              </div>
            </div>
          </div>
        </main>
    </div>
</body>
</html>
