@extends('users.layouts.main')
@section('content')
<div class="content">
    <div class="grids">
        @foreach($posts as $post)
        <div class="grid box">
            <div class="grid-header">
                <h3>{{ $post->title }} </h3>
                <ul>
                    <li><span>{{ trans('user/index.Post_By') }} {{ $post->name }} 
                        {{ trans('user/index.on') }} {{ $post->created_at }}</span>
                    </li>
                </ul>
            </div>
            <div class="grid-img-content">
                <a href="singlepage.html"><img style="width: 200px; height: 150px" src="{{ $post->image }}" /></a>
                <p>{{ $post->brief }}<a href="#"></a></p>
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
                    <li><a class="readmore" href="singlepage.html">{{ trans('user/index.ReadMore') }}</a></li>
                </ul>
                <ul>
                    {!! Form::open(['route' => 'home', 'method' => 'POST']) !!}
	                    {!! Form::token() !!}
	                    {!! Form::text('comment', null, ['class' => 'form-control',
	                    'placeholder' =>  trans('user/index.comment_placeholder') ]) !!}
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
        @endforeach
    </div>
    <div class="clear"> </div>
    <div class="content-pagenation">
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><span></span></li>
        <li><a href="#"></a></li>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
</div>
@endsection
