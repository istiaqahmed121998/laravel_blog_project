<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $categories=Category::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        $posts = $tag->posts();
        $tags=Tag::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('tag',compact('tag','categories','posts','tags'));
    }
}
