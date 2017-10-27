<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container"> 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Ohala') }}
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service Provider Categories
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Chef</a></li>
                                <li><a href="#">Cleaner</a></li>
                                <li><a href="#">Trainer</a></li>
                                <li><a href="#">Baby Sitter</a></li>
                                <li><a href="#">Gardener</a></li>
                            </ul>
                        </li> 
             
                     </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}"><i class="fa fa-sign-in" style="margin-right: 7px"></i>Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}"><i class="fa fa-user-plus" style="margin-right: 7px"></i>Register</a>
                            </li>
                        @else
                            @can('activate-post')
                                <li class="dropdown" style="margin-right: 10px;">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Classified Adz
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('list_drafts') }}">Drafts</a></li>
                                        <li><a href="{{ route('list_deleted_posts') }}">Deleted</a></li>
                                    </ul>
                                </li> 
                            @else
                                <li class="dropdown" style="margin-right: 10px;">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Adz
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('list_drafts') }}">Drafts</a></li>
                                        <li><a href="{{ route('list_published_posts') }}">Published</a></li>
                                    </ul>
                                </li> 
                            @endcan
                            <li class="dropdown" style="margin-right: 10px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="position: relative; margin-left: 30px;">
                                    <!-- <span class="fa fa-user"></span> --> 
                                    <span>
                                        <img src="{{ asset('uploads/avatars/') }}/{{ file_exists(public_path('uploads/avatars/') . Auth::user()->avatar) ? Auth::user()->avatar : 'default.png' }}"  class="img img-responsive img-thumbnail" style="height: 32px; position: absolute; top: 10px; margin-left: -55px;" />
                                    </span>
                                    <span>{{ Auth::user()->name }}</span>
                                    <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span>
                                                            <img src="{{ asset('uploads/avatars/') }}/{{ file_exists(public_path('uploads/avatars/') . Auth::user()->avatar) ? Auth::user()->avatar : 'default.png' }}" alt="{{ Auth::user()->name }}" class="img img-responsive img-thumbnail" style="width: 80px;" />
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left">{{ Auth::user()->name }}</p>
                                                    <p class="text-left small">{{ Auth::user()->email }}</p>
                                                    <p class="text-left">
                                                        <a href="{{ route('profile_index') }}" class="btn btn-info btn-block btn-sm">View Profile</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <button class="btn btn-primary btn-block" 
                                                            href="{{ route('logout') }}" 
                                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                                            <i class="fa fa-btn fa-sign-out"></i>
                                                            Logout
                                                        </button>
                                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                @can('create-post')
                                    <button type="button" class="pull-right btn btn-primary navbar-btn al" onclick="event.preventDefault(); document.getElementById('frm-new-post').submit();">
                                        New
                                    </button>
                                    <form id="frm-new-post" action="{{ route('create_post') }}" method="GET" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endcan
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/starrr.js') }}"></script>
</body>
</html>
