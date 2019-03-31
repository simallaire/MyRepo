<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\PostCreated;

class HomeController extends Controller
{


    public function mail()
    {
        Mail::to('sp.allaire93@gmail.com')->send(new PostCreated());
        
        return 'Email was sent';
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
