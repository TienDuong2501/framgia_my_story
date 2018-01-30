<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class, 'user_id');
    }

    //----------------------- scope Admin/UserController---------------------

    public function scopeFind($query, $id)
    {
        return $query->where('id', '=', $id);
    }

    public function scopePagePagiante($query)
    {
        return $query->paginate(config('userConst.paginate'));
    }

    public function scopeOrder($query, $name)
    {
        return $query->orderBy($name, 'asc');
    }

    public function scopeGetDeactiveUser($query)
    {
        return $query->where('status', '=', config('userConst.checkStatusTrue'));
    }

    public function scopeGetActiveUser($query)
    {
        return $query->where('status', '=', config('userConst.checkStatusFalse'))
                    ->paginate(config('userConst.checkStatusTrue'));
    }

    public function scopeDeleteUser($query, $id)
    {
        return $query->find($id)->delete();
    }

    public function scopeUpdateUser($query, $status)
    {
        return $query->update(['status' => $status]);
    }

    public function scopeAutoCompleteSearch($query, $term)
    {
        return $query->where('name', 'LIKE', '%'.$term.'%')
                    ->orWhere('email', 'LIKE', '%'.$term.'%')
                    ->orWhere('status', 'LIKE', '%'.$term.'%')
                    ->orWhere('role', 'LIKE', '%'.$term.'%')
                    ->orWhere('id', 'LIKE', '%'.$term.'%')
                    ->paginate(config('userConst.paginate'));
    }

    public function scopeUpdateRole($query, $role)
    {
        return $query->update(['role' => $role]);
    }

    public function scopeSearchUser($query, $keyword)
    {
        return $query->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('role', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('id', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$keyword.'%')
                    ->orderBy('name', 'asc')
                    ->paginate(config('userConst.paginate'));
    }
}
