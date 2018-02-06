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

class VotingController extends Controller
{
    public function like(Request $request)
    {
        try {
            $checkLike = Voting::where(['post_id' => $request->id, 'user_id' => Auth::user()->id])->first();
            if ($checkLike) {
                Voting::deleteVote($request->id, Auth::user()->id)->delete();
                $count = Voting::CountVote($request->id)->count();

                return response()->json(['flag' => config('userConst.checkStatusFalse'), 'count' => $count]);
            } else {
                $vote = new Voting();
                $vote->post_id = $request->id;
                $vote->user_id = Auth::user()->id;
                $vote->save();
                $count = Voting::countVote($request->id)->count();

                return response()->json(['flag' => config('userConst.checkStatusTrue'), 'count' => $count]);
            }
        } catch (Exception $e) {
            Log::error($e);
            
            return Back()->withErrors(trans('user/index.failed_comment'));
        }
    }
}
