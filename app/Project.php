<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function files(){
    	return $this->hasMany(File::class);
    }
    public function page(){
        return $this->hasOne(Page::class);
    }    
    public function language(){
        return $this->belongsTo(Language::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }
}
