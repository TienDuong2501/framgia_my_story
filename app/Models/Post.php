<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Auth;

class Post extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class, 'post_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    //-----------------------scope Posts---------------------

    public function scopeAllPosts($query)
    {
        return $query->where('post_status', '=', 'approved')
                    ->orderBy('created_at', 'desc')
                    ->paginate(config('userConst.paginateHome'));
    }

    public function scopePostDetail($query, $id)
    {
        return $query->find($id);
    }

    public function scopeGetPendingPost($query)
    {
        return $query->where([
                ['user_id', '=', Auth::user()->id],
                ['posts.post_status', '=', 'pending'],
            ])->get();
    }

    public function scopeGetDetailPendingPost($query, $id)
    {
        return $query->find($id);
    }

    public function scopeDeletePost($query, $id)
    {
        return $query->find($id)->delete();
    }

    public function scopeGetAllPendingPost($query)
    {
        return $query->where('posts.post_status', '=', 'pending')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeGetAllApprovedPost($query)
    {
        return $query->where('posts.post_status', '=', 'approved')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeApprovePost($query, $id)
    {
        return $query->where('id', '=', $id)
                    ->update(['post_status' => 'approved']);
    }

    public function scopeDisapprovedPost($query, $id)
    {
        return $query->where('id', '=', $id)
                    ->update(['post_status' => 'pending']);
    }

    public function scopeAutoCompleteSearch($query, $term)
    {
        return $query->where('title', 'LIKE', '%'.$term.'%')
                    ->orWhere('id', 'LIKE', '%'.$term.'%')
                    ->orWhere('post_status', 'LIKE', '%'.$term.'%')
                    ->orWhere('brief', 'LIKE', '%'.$term.'%')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeSearchPost($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('id', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('post_status', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('brief', 'LIKE', '%'.$keyword.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeAutoCompleteUserSide($query, $term)
    {
        return $query->where('title', 'LIKE', '%'.$term.'%')
                    ->orWhere('id', 'LIKE', '%'.$term.'%')
                    ->orWhere('brief', 'LIKE', '%'.$term.'%')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeSearchPostUserSide($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('id', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('brief', 'LIKE', '%'.$keyword.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(config('userConst.paginate'));
    }
}
