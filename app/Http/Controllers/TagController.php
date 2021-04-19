<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function tags($id){
        $tags=Blog::where('id', $id)->firstOrFail()->tags;
        $tagname = array();
        foreach ($tags as $tag){
            $tagname[] = $tag->name;
        }  
        return response()->json($tagname);
    }
}
