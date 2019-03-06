<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Language;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function search($query){
    $posts = Post::where('title','like','%'.$query.'%')
                        ->orWhere('body','like','%'.$query.'%')
                        ->get();
    $tags = Tag::where('name','like','%'.$query.'%')->get();
    $languages = Language::where('name','like','%'.$query.'%')->get();

    $data['posts'] = $posts;
    $data['tags'] = $tags;
    $data['languages'] = $languages;
    return response()->json($data, 200);
    }
}
