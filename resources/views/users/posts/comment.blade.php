<div id="show_comment{{ $comment->id }}">
    <div class="comment_author">
        <div class="btn-group managing_comment">
            <p class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
            </p>
            <ul class="dropdown-menu">
                <li class="comment_extend">
                	<a href="#" class="edit"
                	current_user="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif"
                	user_id="{{$comment->user_id}}"
                	data="{{ $comment->id }}"
                	data-url="{{ route('show-form-edit-comment') }}">
                		{{ trans('user/index.Edit') }}
                	</a>
                </li>
                <li class="comment_extend">
                	<a href="#" class="delete" data="{{ $comment->id }}"
                		user_id="{{$comment->user_id}}"
                		current_user="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif"
                		data-url="{{ route('delete-comment') }}">
                		{{ trans('user/index.Delete') }}
                	</a>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#"></a></li>
            </ul>
        </div>
        <img src="http://localhost:8000/images/profile.jpg" alt=" " class="img-responsive">
        <div class="author_name">
            <h3>{{ $userName }}</h3>
            <h5 class="author_time">{{ $comment->created_at }}</h5>
        </div>
    </div>
    <div id="content_comment{{ $comment->id }}" class="show_content_comment">
        {{ $comment->conment }}
    </div>
    <div class="clearfix"> </div>
    <hr>
</div>
