<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
