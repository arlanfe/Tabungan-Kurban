<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery3.5.1.min.js') }}"></script>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @guest
                            {{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
                            {{-- <li><a href="{{ route('register') }}">Register</a></li>                             --}}
                        @else 
                            @if (Auth:: user()->status=='super_admin')
                            <li><a href="{{ route('home') }}">Home</a></li>   
                            <li><a href="{{ route('user.index') }}">Pengguna</a></li>   
                            <li><a href="{{ route('hewan.index') }}">Hewan</a></li>
                            <li><a href="{{ route('nasabah.index') }}">Nasabah</a></li>
                            <li><a href="{{ route('tabungan.index') }}">Tabungan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Laporan <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('laporan.indexN') }}">
                                            Laporan Nasabah
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('laporan.indexT') }}">
                                            Laporan Tabungan
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @else
                            {{-- <li><a href="{{ route('user.index') }}">User</a></li>    --}}
                            <li><a href="{{ route('home') }}">Home</a></li> 
                            <li><a href="{{ route('hewan.index') }}">Hewan</a></li>
                            <li><a href="{{ route('nasabah.index') }}">Nasabah</a></li>
                            <li><a href="{{ route('tabungan.index') }}">Tabungan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Laporan <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('laporan.indexN') }}">
                                            Laporan Nasabah
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('laporan.indexT') }}">
                                            Laporan Tabungan
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                          
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.partials._alerts')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    @yield('chart')
</body>
</html>

