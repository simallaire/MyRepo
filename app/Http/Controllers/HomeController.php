<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\PostCreated;
use App\Post;
use App\User;
use Auth;
class HomeController extends Controller
{


    public function mail()
    {
        $post = Post::find(9);
        $user = Auth::user();

        dd(Mail::to('sp.allaire93@gmail.com')->send(new PostCreated($post,$user)));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info = "You are logged in!";
        return view('home',compact('info'));
    }
    public function about(){
        return view('about');
    }

}
