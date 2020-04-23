<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'e-Library')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('forms/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('forms/js/main.js')); ?>"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c4f9ad04a.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/card.css')); ?>" rel="stylesheet">
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
                <a class="h3 text-primary font-weight-bolder" href="<?php echo e(url('/')); ?>">
                    <i class="fas fa-book text-primary"></i>
                    <?php echo e(config('app.name', 'e-Library')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto h4">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                

                                <div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-books')): ?>
                                        <li class = "nav-item font-weight-bold
                                         <?php echo e(Request::path()=== "books"?"active":""); ?>">
                                            <a class = "nav-link" href="/home"> 
                                                View Books
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold
                                         <?php echo e(Request::path()=== "books/create"?"active":""); ?>">
                                            <a class = "nav-link" href="<?php echo e(route('books.create')); ?>"> 
                                                Add Book
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-users')): ?>
                                        <li class = "nav-item font-weight-bold
                                         <?php echo e(Request::path()=== "users"?"active":""); ?>">
                                            <a class="nav-link" href="<?php echo e(route('users.index')); ?>"> 
                                                Manage Users
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-books')): ?>
                                        <li class = "nav-item font-weight-bold 
                                        <?php echo e(Request::path()=== "userBooks"?"active":""); ?>">    
                                            <a class="nav-link" href="<?php echo e(route('userBooks.index')); ?>"> 
                                                All Books
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold <?php echo e(Request::path()=== "userBooks/1"?"active":""); ?>">
                                            <a class="nav-link" href="<?php echo e(route('userBooks.show',1)); ?>"> 
                                                Already Read
                                            </a>
                                        </li>
                                        <li class = "nav-item font-weight-bold
                                         <?php echo e(Request::path()=== "userBooks/2"?"active":""); ?>">
                                            <a class="nav-link" href="<?php echo e(route('userBooks.show',2)); ?>"> 
                                                Unread
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                        <li class = "nav-item font-weight-bold">
                                            <a class="nav-link text-danger" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                            </a>
                                        </li>                                      
                                    
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                     style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

</body>
</html>
<?php /**PATH C:\wamp64\www\eLibrary\resources\views/layouts/app.blade.php ENDPATH**/ ?>