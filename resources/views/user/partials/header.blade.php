<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FeedLive Website Template | Home :: W3layouts</title>
        <link href='//fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" type="text/css"  media="all" />
        <meta name="keywords" content="FeedLive iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <link href='//fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
        <!-- google fonts  -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Voting-Page
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
                                    {{-- 
                                    <li><a href="{{ route('admin.home') }}">admin</a></li>
                                    <li>
                                        --}}
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @else
                                        {{-- 
                                        <li><a href="{{ route('addGetForm') }}">Create Post</a></li>
                                        <li><a href="{{ route('mypost') }}">My Post</a></li>
                                        --}}
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>
                                        {!! Form::open(['route' => 'logout', 'method' => 'POST', 'style' => 'display:none', 'id' => 'logout-form']) !!}
                                            {!! Form::token() !!}
                                        {!! Form::close() !!}
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!---start-wrap---->