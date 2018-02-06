<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $table = 'comments';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //--------------scope--------------
    public function scopegetComments($query, $id)
    {
        return $query->where('post_id', '=', $id)
            ->orderBy('created_at', 'asc')
            ->paginate(config('userConst.paginateHome'));
    }

    public function scopeeditComment($query, $id, $comment)
    {
        return $query->where('id', '=', $id)->update(['conment' => $comment]);
    }

    public function scopedeleteComment($query, $id)
    {
        return $query->where('id', '=', $id)->delete();
    }

    public function scopecountComment($query, $postId)
    {
        return $query->where('post_id', '=', $postId)->count();
    }
}
