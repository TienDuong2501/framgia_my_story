<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
