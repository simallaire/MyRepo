<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function project(){
    	$this->belongsToOne(Project::class);
    }
}
