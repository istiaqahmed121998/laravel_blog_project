<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $blogs=Blog::orderBy('created_at','DESC')->take(5)
        ->get();
        $categories=Category::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('welcome',compact('blogs','categories'));
    }
}
