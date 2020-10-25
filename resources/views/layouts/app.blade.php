<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .top-buffer { margin-top:20px; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My test Laravel blog</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity=""
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="{!! url('js/summernote_editor_settings.js') !!}"></script>
</head>
<body>


<div class="container-fluid">
    <div class="row align-items-start">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="{{ url('/') }}"><svg width="123" height="33" viewBox="0 0 123 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.0982608">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 32H7V10H0V32Z" fill="#070808"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M42.5378 27.0282L38.4187 10H32L38.6421 32H46.3104L53 10H46.5565L42.5378 27.0282Z"
                              fill="#070808"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M64.4593 28.1328C61.8071 28.1328 60.4811 26.0769 60.4811 21.1258C60.4811 16.3005 61.8071 14.1605 64.4593 14.1605C67.1114 14.1605 68.4375 16.2166 68.4375 21.1677C68.4375 25.993 67.1114 28.1328 64.4593 28.1328ZM64.4593 9.29346C57.746 9.29346 53.6849 13.9927 53.6849 21.1258C53.6849 28.6362 57.7875 33 64.4593 33C71.1725 33 75.2336 28.3006 75.2336 21.1677C75.2336 13.6571 71.1725 9.29346 64.4593 9.29346Z"
                              fill="#070808"></path>
                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="8" height="8">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.0134277H7.19177V7.29523H0V0.0134277Z"
                                  fill="white"></path>
                        </mask>
                        <g mask="url(#mask0)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.59588 0.0133057C1.60993 0.0133057 0 1.6434 0 3.65422C0 5.66505 1.60993 7.29514 3.59588 7.29514C5.58184 7.29514 7.19177 5.66505 7.19177 3.65422C7.19177 1.6434 5.58184 0.0133057 3.59588 0.0133057Z"
                                  fill="#070808"></path>
                        </g>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M24.0727 9.47807C23.1586 9.36381 22.281 9.29958 21.4399 9.27587C21.1155 9.27024 20.8036 9.26698 20.5045 9.26599C16.2845 9.29795 13.0801 10.3532 11.0801 11.2749L11.0569 13.243L11.0916 14.3758V32.2867H17.3194V14.0337C18.2607 13.5465 19.161 13.4086 20.1197 13.3641V13.364C20.1197 13.364 20.281 13.3498 20.5215 13.3506C20.673 13.3479 20.817 13.354 20.9538 13.3685C21.2806 13.3951 21.6508 13.4572 21.9615 13.592C22.7095 13.9166 23.1369 14.2412 23.4041 15.0526C23.4041 15.0526 23.4575 15.3231 23.4575 15.5395C23.4575 15.6204 23.511 16.5466 23.511 17.6755C23.5201 17.9308 23.5235 18.185 23.5235 18.4341V32.2867H30.071V16.0067C29.9672 11.4887 26.7642 9.95035 24.0727 9.47807Z"
                              fill="#070808"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M114.917 22.2329H116.372V28.8064C115.894 28.8477 114.848 28.9174 113.055 28.6801C111.459 28.4691 110.551 27.4953 110.546 25.5019C110.539 23.1023 111.937 22.2329 114.917 22.2329ZM122.997 31.336C122.987 29.9776 122.947 27.3673 122.947 25.879V16.8445C123.16 11.6572 120.215 9.28918 113.841 9.28918C111.357 9.28918 108.941 9.71769 106.029 10.6003L107.054 14.5337C109.876 13.9592 111.188 13.8446 112.593 13.7593C115.071 13.6087 116.458 14.8839 116.359 16.339L116.372 18.587H114.296C107.633 18.587 103.989 21.2272 103.99 26.0886C103.991 28.759 105.325 30.8379 107.606 31.8614C108.791 32.4468 110.568 32.504 113.169 32.5115C119.234 32.5289 122.619 32.5335 122.971 32.4843L123 31.9825V31.9381L122.997 31.336Z"
                              fill="#070808"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M78.2885 32.549H84.8299V0.828979L78.2885 1.47302V32.549Z" fill="#070808"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M102.096 28.1284C101.294 28.2401 101.741 28.2047 100.951 28.2718C98.3698 28.491 97.6497 28.1524 97.3291 27.6114C97.0698 27.1738 97.0293 26.74 96.9561 25.8133C96.9387 25.6594 96.9287 25.5048 96.9283 25.3515C96.9281 25.2845 96.9281 25.2175 96.9279 25.1505C96.9266 25.0552 96.9263 24.9555 96.927 24.8508C96.927 24.8497 96.9273 24.8487 96.9273 24.8476C96.9192 21.5076 96.9202 18.1677 96.9196 14.8276L96.92 14.5418H102.771L102.771 10.0478H96.9022L96.9044 9.77153V2.66235C94.8545 3.07762 92.5237 3.64603 90.4862 4.05868V9.71546L90.488 10.0478H87.6454V14.3593C87.6506 14.4438 87.6563 14.5012 87.6623 14.5245C87.7568 14.5306 87.8605 14.543 87.9641 14.5432C88.6996 14.545 89.4351 14.5435 90.1706 14.5449C90.273 14.5451 90.3754 14.5553 90.498 14.5621V14.9098C90.498 17.7515 90.4972 20.5931 90.4987 23.4347C90.4991 24.3067 90.4877 25.1794 90.5142 26.0507C90.5464 27.1127 90.4873 28.3784 90.8659 29.3771C91.5088 31.0736 92.9837 32.1133 94.56 32.5585C95.1679 32.7301 96.1567 32.8985 96.9234 32.9254C97.8821 32.959 98.7309 32.941 99.6649 32.8598C100.784 32.7626 101.853 32.4723 103.038 32.1193C102.731 30.7225 102.434 29.5448 102.096 28.1284Z"
                              fill="#070808"></path>
                    </g>
                </svg></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('articles') }}">Статьи</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Категории
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($nav_categories->all() as $category)
                                <a class="dropdown-item" href="{{url('/articles/category')}}/{{$category->id}}">{{$category->name}}</a>
                                @endforeach
                            </div>

                        </li>
                        <li class="nav-item">
                            @if (!Auth::check())
                                <form method="POST" action="{{ route('login') }}" class="form-inline">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control"  type="email" name="email" placeholder="email@example.com">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="password" class="form-control" type="password" name="password" required placeholder="Пароль">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">запомнить</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Войти</button>
                                    @if (Route::has('password.request'))
                                        <div>
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            Забыли пароль?
                                        </a>
                                        </div>
                                    @endif
                                </form>
                            @endif
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="{{ url('dummy') }}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">поиск</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        @if (Auth::check())
        <div class="col-md-2">
            <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Статьи
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('articles') }}">Просмотр статей</a>
                        <a class="dropdown-item" href="{{ url('article') }}">Добавить статью</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Категории
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('categories') }}">Просмотр категорий</a>
                        <a class="dropdown-item" href="{{ url('category') }}">Добавить категорию</a>
                    </div>
                </li>
                <li class="nav-item">
                       <a class="nav-link" href="{{ url('comments') }}">Комментарии</a>
                </li>

                <li class="nav-item">
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm">
                                Выйти
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    @endif
                </li>
            </ul>
            </div>
        </div>
        @endif
        <div class="@if (Auth::check()) col-md-10 @else col-md-12 @endif">
            @isset($current_category)
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">{{$current_category}}</a>
                    </li>
                </ol>
            </nav>
            @endisset
            <div>
                @yield('message')
            </div>
            <div class="col-md-12 bg-light">
                @include('common.errors')
                @if(Session::has('flash_message'))
                    <div class="alert alert-success top-buffer">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="col-md-12">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Build v{{ Illuminate\Foundation\Application::VERSION }} for involta 2021
        </div>
    </div>
</div>
</body>
</html>
