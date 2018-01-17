<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    protected $table = 'postdetail';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function suggest()
    {
        return $this->hasMany(Suggest::class);
    }
}
