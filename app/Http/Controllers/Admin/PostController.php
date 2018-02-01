<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }

    public function showAllPendingPost()
    {
        $pendingPosts = Post::GetAllPendingPost();
        
        return view('admin.posts.pendingPost', compact('pendingPosts'));
    }

    public function showAllApprovedPost()
    {
        $approvedPost = Post::GetAllApprovedPost();

        return view('admin.posts.approvedPost', compact('approvedPost'));
    }

    public function detailPendingPost(Request $request)
    {
        if ($request->ajax()) {
            $detaiPost = Post::PostDetail($request->id);

            return $detaiPost;
        } else {
            return 'somethings went wrong here!';
        }
    }

    public function approvePost(Request $request)
    {
        if ($request->ajax()) {
            Post::ApprovePost($request->id);

            return 'the post is approved successfully!';
        } else {
            return 'somethings went wrong here!';
        }
    }

    public function deletePendingPost(Request $request)
    {
        if ($request->ajax()) {
            Post::DeletePost($request->id);

            return 'the post is deleted successfully!';
        } else {
            return 'somethings went wrong here!';
        }
    }

    public function detailApprovedPost(Request $request)
    {
        if ($request->ajax()) {
            $detaiPost = Post::PostDetail($request->id);

            return $detaiPost;
        } else {
            return 'somethings went wrong here!';
        }
    }

    public function disapprovedPost(Request $request)
    {
        if ($request->ajax()) {
            Post::UnapprovedPost($request->id);

            return 'the post is disapprove successfully!';
        }
    }
}
