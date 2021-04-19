<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('author.dashboard');
    }
    public function check(){
        return 'check';
    }

}
