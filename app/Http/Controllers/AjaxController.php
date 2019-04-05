<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\PostCommented;
use App\Post;
use App\Tag;
use App\Language;
use App\File;
use App\Comment;
use App\User;
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
        $data['userid']= Auth::user()->id;
        $data['id'] = $comment->id;


        //Send Email to post owner
        $post = Post::find($request['postid']);
        $sendTo = User::find($post->user_id);
        Mail::to($sendTo->email)->send(new PostCommented($comment,$post,Auth::user()));


        return response()->json($data,200);
    }
    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        $data['msg'] = "Post was succesfully deleted.";
        return response()->json($data,200);
    }
    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        $data['msg'] = "Comment was succesfully deleted.";
        return response()->json($data,200);

    }
    public function deleteFile($id){
        $File = File::find($id);
        $File->delete();
        $data['msg'] = "File was succesfully deleted.";
        return response()->json($data,200);
    }
}
