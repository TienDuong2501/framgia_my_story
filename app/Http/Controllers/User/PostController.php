<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Url;
use App\Models\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    public function getAllPost()
    {
        $posts = Post::AllPosts();

        return view('users.index', compact('posts'));
    }

    public function ajaxPagination()
    {
        $posts = Post::AllPosts();

        return view('users.post', compact('posts'));
    }

    public function showPostDetail($id)
    {
        $postDetail = Post::PostDetail($id);

        return view('users.posts.postDetail', compact('postDetail'));
    }

    public function showPostForm()
    {
        return view('users.posts.createPost');
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->brief = $request->sumary;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(config('userConst.public_path_image'), $file->getClientOriginalName());
            $url = Url::to('/').'/images/'.$file->getClientOriginalName();
            $post->image = $url;
            $post->save();
            
            return redirect()->route('my-post');
        } else {
            return redirect()->route('create-post')->with('fail', 'something went wrong,please try again!');
        }
    }

    public function showMyPost()
    {
        $myPost = Post::GetPendingPost();

        return view('users.posts.mypost', compact('myPost'));
    }
}
