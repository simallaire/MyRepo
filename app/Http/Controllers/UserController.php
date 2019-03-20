<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Comments;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(User $user){
    		return view('user.show',compact('user'));

    }
}
