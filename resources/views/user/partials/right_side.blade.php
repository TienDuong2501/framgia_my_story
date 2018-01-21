<div class="right-sidebar">
    <div class="search-bar">
        <form>
            <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" />
            <input type="submit" value="" />
        </form>
    </div>
    <div class="clear"> </div>
    <div class="featured-Videos">
        <h3>Featured Videos</h3>
        <a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="videos" /></a>
    </div>
    <div class="popular-post">
        <h3>popular-posts</h3>
        <div class="post-grid">
            <img src="{{asset('user/images/videos.jpg')}}" title="post1">
            <p>
                Lorem ipsum dolor sit ametconsectetur dolor,
                <a href="#">
                    ...
            </p>
            <div class="clear"> </div>
        </div>
        <div class="post-grid">
        <img src="{{asset('user/images/videos.jpg')}}" title="post1">
        <p>Lorem ipsum dolor sit ametconsectetur dolor,<a href="#">...</p>
        <div class="clear"> </div>
        </div>
        <div class="view-all">
        <a href="#">ViewAll</a>
        </div>
    </div>
    <div class="clear"> </div>
    <div class="featured-Videos">
        <h3>Recent Videos</h3>
        <a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="videos" /></a>
    </div>
    <div class="fallowers">
        <h3>Followers</h3>
        <ul>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
            <li><a href="#"><img src="{{asset('user/images/videos.jpg')}}" title="name"></a></li>
        </ul>
    </div>
</div>
</div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
</body>
</html>