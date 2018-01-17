<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'suggests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postDetail()
    {
        return $this->belongsTo(PostDetail::class);
    }
}
