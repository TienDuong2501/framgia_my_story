@extends('layouts.app')
@section('content')
<div class="agile-login">
<div class="wrapper">
<h2>{{ trans('resetPassword.title') }}</h2>
<div class="w3ls-form">
{!! Form::open(['route' => 'password.request', 'method' => 'POST']) !!}
{!! Form::token() !!}
{!! Form::hidden('token', $token) !!}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label(null, trans('resetPassword.email')) !!}
    {!! Form::email('email', old('email'), ['placeholder' => trans('resetPassword.email.plh'), 'required']) !!}
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        {!! Form::label(null, trans('resetPassword.password')) !!}
        {!! Form::password('password', ['placeholder' => trans('resetPassword.password'), 'required']) !!}
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            {!! Form::label(null, trans('resetPassword.confirm_password')) !!}
            {!! Form::password('password_confirmation', null, 'required') !!}
            {!! Form::submit(trans('resetPassword.reset_password')) !!}
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