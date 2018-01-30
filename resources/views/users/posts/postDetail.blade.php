@extends('users.layouts.main')
@section('content')
<div class="content">
    <div class="grids">
        <div class="grid box">
            <div class="grid-header">
                <h3>{{ $postDetail->title }}</h3>
                <ul>
                    <li><span>{{ trans('user/index.Post_By') }} {{ $postDetail->user->name }} 
                        {{ trans('user/index.on') }} {{ $postDetail->created_at }}</span>
                    </li>
                </ul>
            </div>
            <div class="singlepage">
                <a href="#"><img src="{{ $postDetail->image }}" /></a>
                <p>{{ $postDetail->body }}</p>
                <div class="clear"> </div>
            </div>
            <div class="comments">
                <ul>
                    <li>
                        <a href="">
                        {{ trans('user/index.Vote') }}
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="comment">
                        <a href="">{{ trans('user/index.Comment') }}
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li></li>
                </ul>
                <ul>
                    {!! Form::open(['route' => 'home', 'method' => 'POST']) !!}
	                    {!! Form::text('comment', null, ['class' => 'form-control',
	                    'placeholder' =>  trans('user/index.comment_placeholder') ]) !!}
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
    <div class="clear"> </div>
</div>
@endsection
