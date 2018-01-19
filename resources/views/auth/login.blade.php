@extends('layouts.app')
@section('content')
<div class="agile-login">
<div class="wrapper">
<h2>{{ trans('login.login') }}</h2>
<div class="w3ls-form">
    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
    {!! Form::token() !!}
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label(null, trans('login.email')) !!}
        {!! Form::email('email', old('email'),['placeholder' => trans('login.username'), 'required', 'autofocus']) !!}
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
            {!! Form::label(null, trans('login.password')) !!}
            {!! Form::password('password', ['placeholder' => trans('login.password'),'required']) !!}
            <a href="{{ route('password.request') }}" class="pass">{{ trans('login.forgot_password') }}</a>
            {!! Form::submit(trans('login.login')) !!}
            {!! Form::close() !!}
        </div>
        <div class="agile-icons">
            <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-pinterest-p"></span></a>
        </div>
    </div>
</div>
@endsection