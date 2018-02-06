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
            <div id="notification"></div>
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
                        <a href="" data="{{ $post->id }}" 
                            userId="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif" 
                            data-url="{{ route('like-post') }}" id="{{ $post->id }}"  class="vote 
                            @if(isset($checkVotings))
                                @foreach($checkVotings as $checkvoting)
                                    @if($checkvoting->post_id == $post->id) change @endif
                                @endforeach
                            @endif">
                        <span>{{ trans('user/index.Vote') }}</span> 
                        <span id="count{{ $post->id }}">({{ $post->votings->count() }})</span>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="comment">
                        <a href="{{ route('show-post-detail', ['id' => $post->id]) }}">
                            {{ trans('user/index.Comment') }}
                        <span>({{ $post->comments->count() }})</span>
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="readmore" href="{{ route('show-post-detail', ['id' => $post->id]) }}">
                        {{ trans('user/index.ReadMore') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
        @endforeach
        <div class="clear"> </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </div>
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
</div>
@endsection
