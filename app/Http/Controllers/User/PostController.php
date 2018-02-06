<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Url;
use App\Http\Requests\StorePostTable;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\User;
use Purifier;
use App\Models\Voting;
use App\Models\Comment;
use Auth;

class PostController extends Controller
{
    public function getAllPost()
    {
        $posts = Post::with(['votings', 'comments'])->allPosts();
        if (Auth::check()) {
            $checkVotings = Voting::userVote(Auth::user()->id)->get();

            return view('users.index', compact('posts', 'checkVotings'));
        }

        return view('users.index', compact('posts'));
    }

    public function showPostDetail($id)
    {
        $postDetail = Post::with(['votings', 'comments'])->postDetail($id);
        if (Auth::check()) {
            $checkVoting = Voting::checkVoting($id, Auth::user()->id)->first();
            $comments = Comment::getComments($id);

            return view('users.posts.postDetail', compact('postDetail', 'checkVoting', 'comments'));
        }
        $comments = Comment::getComments($id);

        return view('users.posts.postDetail', compact('postDetail', 'comments'));
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
        $myPost = Post::getPendingPost();

        return view('users.posts.mypost', compact('myPost'));
    }

    public function viewMyPost(Request $request)
    {
        try {
            $mypost = Post::getDetailPendingPost($request->id);

            return response($mypost);
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.fail'));
        }
    }

    public function showMyPostForm(Request $request)
    {
        try {
            $mypost = Post::getDetailPendingPost($request->id);

            return response($mypost);
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.fail'));
        }
    }

    public function deletePost(Request $request)
    {
        try {
            Post::deletePost($request->id);

            return 'the Post is deleted successfully';
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.fail'));
        }
    }

    public function editMyPost(Request $request)
    {
        try {
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
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.fail'));
        }
    }

    public function search(Request $request)
    {
        $term = $request->term;
        $posts = Post::autoCompleteUserSide($term);
        if (count($posts) == 0) {
            $searchResults[] = 'No Post Found';
        } else {
            foreach ($posts as $key => $value) {
                $searchResults[] = $value->title;
            }
        }

        return $searchResults;
    }

    public function searchPostUserSide(Request $request)
    {
        $keyword = $request->keyword;
        $results = Post::searchPostUserSide($keyword);

        return view('users.posts.search_user_side', compact('results'));
    }
}
