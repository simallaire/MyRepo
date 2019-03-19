<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post(){
        return $this->belongsToOne(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
