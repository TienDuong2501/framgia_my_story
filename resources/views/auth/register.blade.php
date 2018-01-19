@extends('layouts.app')
@section('content')
<div class="agile-login">
<div class="wrapper">
<h2>{{ trans('register.register') }}</h2>
<div class="w3ls-form">
{!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
{!! Form::token() !!}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label(null, trans('register.name') ) !!}
    {!! Form::text('name', old('name'), ['placeholder' => trans('register.username'), 'required', 'autofocus' ]) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label(null, trans('register.email')) !!}
        {!! Form::email('email', old('email'),['placeholder' => trans('register.email'), 'required']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label(null, trans('register.password')) !!}
            {!! Form::password('password', ['placeholder' => trans('register.password'), 'required']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            {!! Form::label(null, trans('register.confirm_password')) !!}
            {!! Form::password('password_confirmation',['required']) !!}
            {!! Form::submit(trans('register.register')) !!}
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