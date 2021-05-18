<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function index(){
        $comments=Comment::all();

    }
    public function store(Request $request,$slug){
        $blog = Blog::where('slug', $slug)->firstOrFail();
        if(Auth::check()){
            $comment = new Comment();
            $comment->blog_id=$blog->id;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->input('comment');
            $comment->save();
            $data=Comment::with('user')->where('id', $comment->id)->get();
            return response()->json(['data' => $data, 'success' => true], 200);
        }

    }
    public function show($slug){
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return $blog->comments;
    }

}
