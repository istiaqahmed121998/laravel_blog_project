<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index(){
        $blogs=Blog::all();
        return view('welcome',compact('blogs'));
    }

    public function show($slug){
        
        $blog=Blog::where('slug',$slug)->firstOrFail();
        return view('post',compact('blog'));
    }
}
