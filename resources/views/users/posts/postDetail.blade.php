@extends('users.layouts.main')
@push('script')
{!! Html::script('js/user.js') !!}
@endpush
@section('content')
@include('users.posts.edit_comment')
<div class="content">
    <div class="grids">
        <div class="grid box">
            <div class="grid-header">
                <h3>{{ $postDetail->title }}</h3>
                <ul>
                    <li>
                        <span>{{ trans('user/index.Post_By') }} {{ $postDetail->user->name }} 
                        {{ trans('user/index.on') }} {{ $postDetail->created_at }}
                        </span>
                    </li>
                </ul>
            </div>
            <div id="notification"></div>
            <div class="singlepage">
                <a href="#"><img src="{{ $postDetail->image }}" /></a>
                <p>{!! $postDetail->body !!}</p>
                <div class="clear"> </div>
            </div>
            <div class="comments">
                <ul>
                    <li>
                        <a href="" data="{{ $postDetail->id }}" 
                            userId="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif" 
                            data-url="{{ route('like-post') }}"
                            id="{{ $postDetail->id }}" 
                            class="vote 
                            @if(isset($checkVoting))
                            change
                            @endif">
                        <span>{{ trans('user/index.Vote') }}</span> 
                        <span id="count{{ $postDetail->id }}">
                        ({{ $postDetail->votings->count() }})
                        </span>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="comment">
                        <a href="">{{ trans('user/index.Comment') }}
                        (<span id="count_comment{{ $postDetail->id }}">
                        {{ $postDetail->comments->count() }}
                        </span>)
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li></li>
                </ul>
                <div id="result">
                    @foreach($comments as $comment)
                    <div id="show_comment{{ $comment->id }}">
                        <div class="comment_author">
                            <div class="btn-group managing_comment">
                                <p class="dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </p>
                                <ul class="dropdown-menu">
                                    <li class="comment_extend">
                                        <a href="#" class="edit"
                                            current_user="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif"
                                            user_id="{{$comment->user_id}}"
                                            data="{{ $comment->id }}"
                                            data-url="{{ route('show-form-edit-comment') }}">
                                        Edit
                                        </a>
                                    </li>
                                    <li class="comment_extend">
                                        <a href="#" class="delete"
                                            post_id="{{ $postDetail->id }}"
                                            data="{{ $comment->id }}"
                                            user_id="{{$comment->user_id}}"
                                            current_user="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif"
                                            data-url="{{ route('delete-comment') }}">
                                        Delete
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <img src="http://localhost:8000/images/profile.jpg"
                                alt=" " class="img-responsive">
                            <div class="author_name">
                                <h3>{{ $comment->user->name }}</h3>
                                <h5 class="author_time">{{ $comment->created_at }}</h5>
                            </div>
                        </div>
                        <div id="content_comment{{ $comment->id }}" class="show_content_comment">
                            {{ $comment->conment }}
                        </div>
                        <div class="clearfix"> </div>
                        <hr>
                    </div>
                    @endforeach
                </div>
                <ul>
                    {!! Form::open(['route' =>  'comment-post',
                    'method' => 'POST',
                    'id' => 'frm_comment',
                    'data' => $postDetail->id]) !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control',
                        'placeholder' =>  trans('user/index.comment_placeholder'),
                        'rows' => 5,
                        'id' => 'content_comment']) !!}
                        <br userId="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif">
                        {!! Form::submit('Comment',
                        ['class' => 'btn btn-primary',
                        'style' => 'float:right',
                        'id' => 'btn_comment']) !!}
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
