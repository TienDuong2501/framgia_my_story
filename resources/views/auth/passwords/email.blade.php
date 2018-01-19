@extends('layouts.app')
@section('content')
<div class="agile-login">
<div class="wrapper">
    <h2>{{ trans('email.reset_password') }}</h2>
    <div class="w3ls-form">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        {!! Form::open(['route' => 'password.email', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        {!! Form::token() !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            {!! Form::label(null, trans('email.email')) !!}
            {!! Form::email('email', old('email'), ['placeholder' => trans('email.email_plh'), 'required', 'autofocus']) !!}
            {!! Form::submit('') !!}
            {!! Form::close(trans('email.send_link_reset')) !!}
        </div>
        <div class="agile-icons">
            <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-pinterest-p"></span></a>
        </div>
    </div>
</div>
@endsection