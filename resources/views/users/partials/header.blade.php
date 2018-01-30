<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('user/index.Title') }} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! Html::style('css/app.css') !!}
        {!! Html::style('assets/font-awesome/css/font-awesome.css') !!}
        {!! Html::style('css/style.css') !!}
    </head>
    <body>
        <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" 
                    data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ trans('user/index.Home') }}
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a href="{{ route('login') }}">{{ trans('user/index.Login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ trans('user/index.Register') }}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
                                        <li>
                                            <a href="{{ route('admin.home') }}">
                                                {{ trans('user/index.Admin') }}
                                            </a>
                                        </li>
                                        <li><a href="">{{ trans('user/index.Create_Post') }}</a></li>
                                        <li><a href="">{{ trans('user/index.My_Post') }}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ trans('user/index.Logout') }}
                                            </a>
                                            {!! Form::open(['route' => 'logout', 'method' => 'POST',
                                            'id' => 'logout-form', 'style' => 'display: none;']) !!}
                                            {!! Form::token() !!}
                                            {!! Form::close() !!}
                                        </li>
                                    @else
                                        <li><a href="">{{ trans('user/index.Create_Post') }}</a></li>
                                        <li><a href="">{{ trans('user/index.My_Post') }}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ trans('user/index.Logout') }}
                                            </a>
                                            {!! Form::open(['route' => 'logout', 'method' => 'POST',
                                            'id' => 'logout-form', 'style' => 'display: none;']) !!}
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
        