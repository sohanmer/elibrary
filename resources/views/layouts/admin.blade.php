<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Library') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
    <!-- Fonts -->
    <link href="{{asset('/main.css')}}" rel="stylesheet"></head>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <script src="https://kit.fontawesome.com/9c4f9ad04a.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('forms/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('forms/css/main.css')}}">
    <link href="{{asset('dashboard/main.css')}}" rel="stylesheet">  
    <style>
        a:hover{
            text-decoration: none;           
        }
    </style>
    
</head>
<body>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="text-danger">Delete Book</span></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Are You Sure?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:70px">Cancel</button>
                <form id="delete-form"  method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" style="width:70px" >Delete</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><span class="text-danger">Delete User</span></span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are You Sure?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" style="width:70px" data-dismiss="modal">Cancel</button>
              <form id="user-delete"  method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" style="width:70px" class="btn btn-danger" >Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div>
                    <a href="{{route('admin.index')}}">
                        <span class="h3 font-weight-bolder text-primary" id="header-logo">
                            <i class="fas fa-book text-primary"></i>
                            {{ config('app.name', 'eLibrary') }}
                        </span>
                    </a>
                </div>            
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar" onclick="hideLogo()">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav" >
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <button class="close"></button>
                    </div>
                </div>
                <div class="ml-auto">
                    <ul class="navbar-nav ml-auto h4">
                        <li class = "nav-item font-weight-bold">
                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </ul> 
                </div>
            </div>
        </div>
        <div class="app-main"> 
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Manage Books</li>
                                <li>
                                    <a href="{{route('books.index')}}" class="{{Request::path()=== "books"?"mm-active":""}}" >
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        View Books
                                    </a>
                                    <a href="{{route('books.create')}}">
                                        <i class="metismenu-icon pe-7s-plus {{Request::path()=== "books/create"?"mm-active":""}}"></i>
                                        Add Book
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Manage User</li>
                                <li>
                                    <a href="{{route('users.index')}}" class="{{Request::path()=== "users"?"mm-active":""}}">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        View Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        <main style="width: 100%">
            <div class="container-fluid">
            @yield('content')
        </div>
        </main>
        <script>
        function hideLogo() {
            var x = document.getElementById("header-logo");
            if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        <script type="text/javascript" src="{{asset('dashboard/assets/scripts/main.js')}}"></script>
    </body>
</html>
