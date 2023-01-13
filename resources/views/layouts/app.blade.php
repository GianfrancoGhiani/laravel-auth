<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    {{-- paragraph font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- title font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,700;0,800;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark my-navbar shadow-sm">
                <div class="container">
                    {{-- <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
        
                    </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
                    <div class="d-flex w-100 align-items-baseline justify-content-between" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <div class="me-auto">
                            <img src="{{Vite::asset('/resources/img/logo.png')}}" alt="" id="logo">
                        </div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link navbar-element" href="{{url('/') }}">About</a>
                            </li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="my-drop dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        </header>
        
        <main class="container my-5">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
                        <a href="{{route('admin.dashboard')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                          {{-- <svg class="bi pe-none me-2" width="40" height="32" stroke="&23fff"><use xlink:href="#bootstrap"></use></svg> --}}
                
                          <span class="fs-4 d-flex"><i class="fa-solid fa-chart-pie me-3"></i><h4>Dashboard</h4></span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                          <li class="nav-item">
                            <a href="{{route('admin.projects.index')}}" class="nav-link {{Route::currentRouteName() === 'admin.projects.index' ? 'text-primary' : ''}}" aria-current="page">
                                <i class="fa-solid fa-code"></i>
                                Projects
                            </a>
                          </li>
                          <li>
                            <a href="{{route('admin.tags.index')}}" class="nav-link {{Route::currentRouteName() === 'admin.tags.index' ? 'text-primary' : ''}}">
                                <i class="fa-regular fa-tag"></i>
                                Tags
                            </a>
                          </li>
                          <li>
                            <a href="{{route('admin.technologies.index')}}" class="nav-link {{Route::currentRouteName() === 'admin.technologies.index' ? 'text-primary' : ''}}">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                Technologies
                            </a>
                          </li>
                          <li>
                            <a href="#" class="nav-link">
                                <i class="fa-regular fa-comments"></i>
                                Blog
                            </a>
                          </li>
                          <li>
                            <a href="#" class="nav-link ">
                                <i class="fa-solid fa-share"></i>
                                Social
                            </a>
                          </li>
                        </ul>
                        {{-- <hr>
                        <div class="dropdown">
                          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>mdo</strong>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                          </ul>
                        </div> --}}
                      </div>
                </div>
                <div class="col-9">@yield('content')</div>
            </div>
        </main>
        <footer>
        
        </footer>
        
    </div>

    
    {{-- modal --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
</body>

</html>
