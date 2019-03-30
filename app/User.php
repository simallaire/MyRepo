<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;


    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function ownsPost(Post $post){
        if($this->id == $post->user_id)
            return true;
        if(Auth::user()->email=="admin")
            return true;
        return false;
    }
    public function ownsComment(Comment $comment){
        if($this->id == $comment->user_id)
            return true;
        if(Auth::user()->email=="admin")
            return true;
        return false;
    }
    public function isAdmin(){
        return $this->email=="admin";
    }
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
}
