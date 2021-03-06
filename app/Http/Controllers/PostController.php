<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\File;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\PostCreated;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','desc')->paginate(20);
        // dd($posts);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags =  Tag::get();
        return view('post.create',compact(['post','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request);
            $img = $request->file("image");
            $foo = $request['body'];
            $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',

            ]);

            if($request->tags != ""){
                $tags_arr = explode(',',$request->tags);
            }
            $post = new Post();

            $post->title = $request->title;
            $post->body =  $request->body;
            $post->user_id = Auth::user()->id;
            // $post->user_id = 51;

            $post->save();
            if(isset($tags_arr)){
                foreach($tags_arr as $tag_){
                    Tag::newTagPost($tag_,$post->id);
                }
            }
            if(isset($img)){
                $fn = $img->getClientOriginalName();
                $filename = Carbon::now()->format('dmyHi')."_".Controller::generateRandomString(20).".".str_after($fn,".");

                $file = new File();
                $file->originalName = $fn;
                $file->type = "img";
                $file->url = $filename;
                $file->post_id = $post->id;
                $file->save();
                try{
                    $request->image->storeAs('files',$filename);
                }catch(Exception $e){}
            }
            $info = "The post was successfully created. <a href='/post/".$post->id."'>See the post.</a>";


            // foreach(User::get() as $user){
            //     try{
            //         Mail::to($user->email)->send(new PostCreated($post,Auth::user()));
            //     }catch(Exception $ex){}
            // }

            return view('home',compact('info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::user()->ownsPost($post)){
            $tags =  Tag::get();
            return view('post.create',compact(['post','tags']));
        }
        return view('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
                    // dd($request);
                    $img = $request->file('image');
                    $foo = $request['body'];
                    $validatedData = $request->validate([
                    'title' => 'required|max:255',
                    'body' => 'required',

                    ]);

                    if($request->tags != ""){
                        $tags_arr = explode(',',$request->tags);
                    }


                    $post->title = $request->title;
                    $post->body =  $request->body;
                    $post->user_id = Auth::user()->id;
                    // $post->user_id = 51;

                    $post->save();
                    if(isset($tags_arr)){
                        foreach($tags_arr as $tag_){
                            Tag::newTagPost($tag_,$post->id);
                        }
                    }
                    if($img){
                        $fn = $img->getClientOriginalName();
                        $filename = Carbon::now()->format('dmyHi')."_".Controller::generateRandomString(20).".".str_after($fn,".");
                        $request->image->storeAs('files',$filename);
                        $file = new File();
                        $file->type = "img";
                        $file->url = $filename;
                        $file->post_id = $post->id;
                        $file->save();
                    }


                    $info = "The post was successfully updated.";
                    return view('home',compact('info'));
    }


}
