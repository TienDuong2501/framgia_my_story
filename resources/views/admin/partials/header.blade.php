<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('admin/plugins/images/favicon.png') }}">
        <title>@yield('title')</title>
        {{-- {{ Html::style('admin/fontawesome-webfont.ttf') }} --}}
        {{-- {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }} --}}
        {{ Html::style('assets/admin/css/bootstrap.min.css') }}
        {{ Html::style('assets/admin/css/colors/blue-dark.css') }}
        {{ Html::style('assets/admin/css/style.css') }}
    </head>
    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="{{ route('admin.home') }}"><b><img src="{{asset('assets/admin/plugins/images/pixeladmin-logo.png')}}" alt="home" /></b><span class="hidden-xs"><img src="{{asset('assets/admin/plugins/images/pixeladmin-text.png')}}" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        {!! Form::open(['role' => 'search', 'class' => 'app-search hidden-xs']) !!}
                            {!! Form::text(null, null ,['placeholder' =>  trans('admin/admin.placeholder') , 'class' => 'form-control']) !!}
                            <a href=""><i class="fa fa-search"></i></a>
                        {!! Form::close() !!}
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right dropdown">
                    <li>
                        <a class="profile-pic" href="#"> <img src="{{asset('assets/admin/plugins/images/users/duong.png')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"> {{ Session::get('username') }} </b> </a>
                    </li>
                </ul>
            </div>
        </nav>