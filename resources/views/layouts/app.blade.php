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
        <nav style="background-color:#F2F6FA;" class="navbar navbar-expand-md shadow-sm fixed-top">
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
        <div class="pt-4">
          <div class="col-md-4">
                    <div
                    style="background-color:#F2F6FA;"
                    class="sidebar-styles h-100 border-right pt-3 w-25 px-4 pt-5 position-fixed"
                      >
                      <div class="ml-3 mr-3">
                      <div class="active-sidebar-menu sidebar-menu-button d-flex align-items-center p-1 pl-3 rounded d-flex justify-content-start text-dark my-2 font-weight-bold">
                        <i class="far fa-tachometer-fast mr-2"></i>
                        <div class="mt-1">Dashboard</div>
                      </div>
                      <div class="sidebar-menu-button d-flex align-items-center p-1 pl-3 rounded d-flex justify-content-start text-dark my-2 font-weight-bold">
                        <i class="far fa-user-hard-hat mr-2"></i>
                          <div class="mt-1">Employee Management</div>
                      </div>
                      <div class="sidebar-menu-button d-flex align-items-center p-1 pl-3 rounded d-flex justify-content-start text-dark mt-2 font-weight-bold">
                        <i class="fas fa-laptop mr-2"></i>
                        <div class="mt-1">System Management</div>
                      </div>
                        <div class="ml-3">
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                           <i class="far fa-flag mr-2"></i>
                           <div class="mt-1">Country</div>

                          </div>
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                           <i class="far fa-address-card mr-2"></i>
                           <div class="mt-1">State</div>
                          </div>
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                            <i class="far fa-map mr-2"></i>
                              <div class="mt-1">City</div>
                          </div>
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                            <i class="far fa-building mr-2"></i>
                            <div class="mt-1">Department</div>
                          </div>
                        </div>
                      <div class="sidebar-menu-button d-flex align-items-center p-1 pl-3 rounded d-flex justify-content-start text-dark mt-2 font-weight-bold">
                        <i class="fas fa-tasks mr-2"></i>
                        <div class="mt-1">User management</div>
                      </div>
                         <div class="ml-3">
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                            <i class="far fa-user mr-2"></i>
                            <div class="mt-1">User</div>
                          </div>
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                            <i class="fas fa-user-tag mr-2"></i>
                            <div class="mt-1">Role</div>
                          </div>
                          <div class="sidebar-sub-menu-button d-flex align-items-center pl-3 rounded d-flex justify-content-start text-dark my-1 font-weight-bold">
                            <i class="fas fa-unlock-alt mr-2"></i>
                            <div class="mt-1">Permission</div>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
