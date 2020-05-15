<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Library') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('forms/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('forms/js/main.js')}}"></script>
   
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <script src="https://kit.fontawesome.com/9c4f9ad04a.js" crossorigin="anonymous"></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
   
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!--===============================================================================================-->
    
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app" class="sticky-top">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="h3 text-primary font-weight-bolder" href="{{ url('/') }}">
                    <i class="fas fa-book text-primary"></i>
                    {{ config('app.name', 'e-Library') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto h4">
                        <!-- Authentication Links -->
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
                            <li>
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> --}}

                                <div>
                                    @can('manage-books')
                                        <li class = "nav-item font-weight-bold
                                         {{Request::path()=== "books"?"active":""}}">
                                            <a class = "nav-link" href="/home"> 
                                                View Books
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold
                                         {{Request::path()=== "books/create"?"active":""}}">
                                            <a class = "nav-link" href="{{route('books.create')}}"> 
                                                Add Book
                                            </a>
                                        </li>
                                    @endcan
                                    @can('manage-users')
                                        <li class = "nav-item font-weight-bold
                                         {{Request::path()=== "users"?"active":""}}">
                                            <a class="nav-link" href="{{route('users.index')}}"> 
                                                Manage Users
                                            </a>
                                        </li>
                                    @endcan
                                    @can('read-books')
                                        <li class = "nav-item font-weight-bold 
                                        {{Request::path()=== "userBooks"?"active":""}}">    
                                            <a class="nav-link" href="{{route('userBooks.index')}}"> 
                                                All Books
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold {{Request::path()=== "userBooks/1"?"active":""}}">
                                            <a class="nav-link" href="{{route('userBooks.show',1)}}"> 
                                                Already Read
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold
                                         {{Request::path()=== "userBooks/2"?"active":""}}">
                                            <a class="nav-link" href="{{route('userBooks.show',2)}}"> 
                                                Unread
                                            </a>
                                        </li>
                                    @endcan
                                        <li class = "nav-item font-weight-bold">
                                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>                                      
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                     style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>
