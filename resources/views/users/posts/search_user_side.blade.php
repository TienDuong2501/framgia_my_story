@extends('users.layouts.main')
@section('content')

@push('script')
{!! Html::script('js/user.js') !!}
@endpush
<div class="content">
    <div class="panel panel-header">
        @if(count($results) == 0)
            <h3 class=" search_result alert alert-warning">
                {{ trans('user/index.No_Post') }}
            </h3>
        @elseif(count($results) == 1)
            <h3 class=" search_result alert alert-success">
                {{ trans('user/index.Result:') }} {{ count($results) }}
                {{ trans('user/index.singular_result') }}
            </h3>
        @else
            <h3 class=" search_result alert alert-success">
                {{ trans('user/index.Result:') }} {{ count($results) }}
                {{ trans('user/index.plural_results') }}
            </h3>
        @endif
    </div>
    <div class="grids">
        @foreach($results as $post)
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
                <a href="{{ route('show-post-detail', ['id' => $post->id]) }}">
                    <img class="post_interface" src="{{ $post->image }}" />
                </a>
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
    	{{ $results->links() }}
    </div>
    
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
</div>
@endsection
