<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users=User::all();
        $blogs=Blog::all();
        $comments=Comment::all();
        return view('admin.dashboard',compact('users','blogs','comments'));
    }
    public function list(){
        $users=User::all();
        return view('admin.userlist',compact('users'));
    }

}
