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
        return $query->orderBy('created_at', 'desc')->paginate(config('userConst.paginateHome'));
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
}
