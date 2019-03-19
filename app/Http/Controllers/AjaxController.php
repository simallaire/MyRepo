<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Language;
use App\Comment;
use Auth;

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
    public function storePostComment(Request $request){
        $comment = new Comment();
        $comment->body = $request['body'];
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request['postid'];
        $comment->save();

        $data['body'] = $request['body'];
        $data['username'] = Auth::user()->name;

        return response()->json($data,200);
    }
}
