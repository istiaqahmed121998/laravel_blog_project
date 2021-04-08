<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;
    public function postView()
    {
        return $this->belongsTo(Blog::class);
    }

    public static function createViewLog($post)
    {
        $postViews = new PostView();
        $postViews->blog_id = $post->id;
        $postViews->titleslug = $post->slug;
        $postViews->url = request()->url();
        $postViews->session_id = request()->getSession()->getId();
        $postViews->user_id = (auth()->check()) ? auth()->id() : null;
        $postViews->ip = request()->ip();
        $postViews->agent = request()->header('User-Agent');
        $postViews->save();
    }
    
}
