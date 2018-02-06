<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'votings';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    //-------------scope---------------------

    public function scopeuserVote($query, $id)
    {
        return $query->where('user_id', '=', $id);
    }

    public function scopecheckVoting($query, $postId, $userId)
    {
        return $query->where(['post_id' => $postId, 'user_id' => $userId]);
    }

    public function scopedeleteVote($query, $postId, $userId)
    {
        return $query->where(['post_id' => $postId, 'user_id' => $userId]);
    }

    public function scopecountVote($query, $postId)
    {
        return $query->where('post_id', '=' , $postId);
    }
}
