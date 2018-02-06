<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\User;
use Purifier;
use App\Models\Voting;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        try {
            $userComment = User::find($request->user_id);
            $cmt = new Comment();
            $cmt->user_id = $request->user_id;
            $cmt->post_id = $request->post_id;
            $cmt->conment = $request->comment;
            $cmt->save();
            $comment = $cmt->latest()->first();
            $userName = $userComment->name;
            $html = view('users.posts.comment', compact('userName', 'comment'));

            return response($html);
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.failed_comment'));
        }
    }

    public function showFormEditComment(Request $request)
    {
        $comment = Comment::find($request->id);

        return response($comment);
    }

    public function editComment(Request $request)
    {
        try {
            $edit = new Comment();
            $edit->editComment($request->id, $request->comment);
            $comment = $edit->find($request->id);

            return response()->json($comment);
        } catch (Exception $e) {
            Log::error($e);

            return Back()->withErrors(trans('user/index.edit_comment_failed'));
        }
    }

    public function deleteComment(Request $request)
    {
        try {
            Comment::deleteComment($request->id);
            $countComment = Comment::countComment($request->post_id);

            return response()->json(['notification' => 'the post is deleted successfully!',
                'count_comment' => $countComment,
            ]);
        } catch (Exception $e) {
            Log::error($e);

            return Back()->withErrors(trans('user/index.delete_comment_failed'));
        }
    }
}
