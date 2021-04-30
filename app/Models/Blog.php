<?php

namespace App\Models;

use App\Models\PostView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'slug', 'description','metadescription', 'body', 'category_id', 'profile_user_id'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'blog_tags')->withTimestamps();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function postView(){
        return $this->hasMany(PostView::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function showPost(){
        if (auth()->id() == null) {
            return $this->postView()
                ->where('ip', '=',  request()->ip())->exists();
        }
        return $this->postView()
            ->where(function ($postViewsQuery) {
                $postViewsQuery
                    ->where('session_id', '=', request()->getSession()->getId())
                    ->orWhere('user_id', '=', (auth()->check()));
            })->exists();
    }
    public function mostViwedPosts()
    {
    }
}
