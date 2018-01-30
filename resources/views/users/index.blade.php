@extends('users.layouts.main')
@section('content')

@push('script')

{!! Html::script('js/user.js') !!}

@endpush
<div class="content">
    <div class="grids">
        @foreach($posts as $post)
        <div class="grid box">
            <div class="grid-header">
                <h3>{{ $post->title }} </h3>
                <ul>
                    <li><span>{{ trans('user/index.Post_By') }} {{ $post->user->name }} 
                        {{ trans('user/index.on') }} {{ $post->created_at }}</span>
                    </li>
                </ul>
            </div>
            <div class="grid-img-content">
                <a href="singlepage.html"><img class="post_interface" src="{{ $post->image }}" /></a>
                <p>{{ $post->brief }}</p>
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
                    <li>
                        <a class="readmore" href="{{ route('show-post-detail', ['id' => $post->id]) }}">
                            {{ trans('user/index.ReadMore') }}
                        </a>
                    </li>
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
        @endforeach
        <div class="clear"> </div>
    	{{ $posts->links() }}
    </div>
    
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
</div>
@endsection
