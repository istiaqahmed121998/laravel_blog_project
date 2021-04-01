<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $blogs=Blog::take(5)
        ->get()
        ->sortByDesc('created_at');
        $categories=Category::take(5)->get()->sortByDesc('created_at');
        return view('welcome',compact('blogs','categories'));
    }
}
