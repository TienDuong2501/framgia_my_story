<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Post extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
        return $query->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*')
            ->paginate(5);
    }
}
