<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function like()
    {
        return $this->hasMany('App\Like');
    }
    
    public function news()
    {
        return $this->hasMany('App\News');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function setlist()
    {
        return $this->hasMany('App\Setlist');
    }
    
    // public function follow_user()
    // {
    //     return $this->hasManyThrough(
    //         User::class,
    //         FollowUser::class,
    //         'user_id',
    //         'id',
    //         null,
    //         'followed_user_id'
    //         );
    // }
     public function active_relationships()
    {
        return $this->hasMany('App\Relationship','follower_id');
    }
}
