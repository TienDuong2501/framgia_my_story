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
        $this->middleware('auth');
    }

    public function showAllPendingPost()
    {
        $pendingPosts = Post::GetAllPendingPost();
        
        return view('admin.posts.pendingPost', compact('pendingPosts'));
    }
}
