<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function project(){
    	return $this->belongsTo(Project::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
