<div class="right-sidebar">
    <div class="search-bar">
        {!! Form::open(['route' => 'home', 'method' => 'POST']) !!}
	        {!! Form::text('search', 'search',
	        ['onfocus' => "this.value = ''", 'onblur' => "if (this.value == '') {this.value = 'Search';}"]) !!}
	        {!! Form::submit('') !!}
        {!! Form::close() !!}
    </div>
    <div class="clear"> </div>
    <div class="popular-post">
        <h3>{{ trans('user/index.popular_posts') }}</h3>
        <div class="post-grid">
            <img src="images/videos.jpg" title="post1">
            <p>
                <a href="#">
                    ...
            </p>
            <div class="clear"> </div>
        </div>
        <div class="post-grid">
	        <img src="images/videos.jpg" title="post1">
	        <p><a href="#">...</p>
	        <div class="clear"> </div>
        </div>
        <div class="view-all">
        <a href="#">{{ trans('user/index.ViewAll') }}</a>
        </div>
    </div>
    <div class="clear"> </div>
    <div class="featured-Videos">
        <h3>{{ trans('user/index.Recent_Posts') }}</h3>
        <a href="#"><img src="images/videos.jpg" title="videos" /></a>
        <div class="clear"> </div>
        <div class="view-all">
            <a href="#">{{ trans('user/index.ViewAll') }}</a>
        </div>
    </div>
</div>
</div>
</div>