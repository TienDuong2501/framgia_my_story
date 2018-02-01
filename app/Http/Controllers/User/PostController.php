<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Url;
use App\Http\Requests\StorePostTable;
use App\Models\Post;
use App\User;
use Purifier;
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

    public function createPost(StorePostTable $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->brief = $request->sumary;
        $post->body = Purifier::clean($request->body);
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

    public function showAllMyPost()
    {
        $myPost = Post::GetPendingPost();

        return view('users.posts.mypost', compact('myPost'));
    }

    public function viewMyPost(Request $request)
    {
        if ($request->ajax()) {
            $mypost = Post::GetDetailPendingPost($request->id);

            return response($mypost);
        }
        return 'somethings went wrong here!';
    }

    public function showMyPostForm(Request $request)
    {
        if ($request->ajax()) {
            $mypost = Post::GetDetailPendingPost($request->id);

            return response($mypost);
        }
         return 'somethings went wrong here!';
    }

    public function deletePost(Request $request)
    {
        if ($request->ajax()) {
            Post::DeletePost($request->id);

            return 'the Post is deleted successfully';
        } else {
            return 'somethings went wrong';
        }
    }

    public function editMyPost(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile($request->image)) {
                $file = $request->file($request->image);
                $file->move(config('userConst.public_path_image'), $file->getClientOriginalName());
                $url = Url::to('/').'/images/'.$file->getClientOriginalName();
                Post::where('id', '=', $request->id)->update([
                                'title' => $request->title,
                                'brief' => $request->sumary,
                                'image' => $url,
                                'body' => $request->body,
                            ]);

                return 'the post is updated successfully!';
            } else {
                Post::where('id', '=', $request->id)
                    ->update([  'title' => $request->title,
                                'brief' => $request->sumary,
                                'body' => $request->body,
                            ]);

                return 'the post is updated successfully!';
            }
        } else {
            return 'somethings went wrong. please try again!';
        }
    }
}
