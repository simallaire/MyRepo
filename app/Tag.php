<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function project(){
    	return $this->belongsToMany(Project::class);
    }
    
    public static function newTag($tag_,$project_id){
            if(!Tag::where('name',strtolower($tag_))->first()){
                $tag = new Tag();
                $tag->name = strtolower($tag_);
                $tag->save();
            }else{
            	$tag = Tag::where('name',strtolower($tag_))->first();

            }
        	$project = Project::find($project_id);
        	$project->tags()->attach($tag);
    }
}
