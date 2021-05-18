@extends('layouts.blog')
@section('title', $blog->title)
@section('meta')
<meta name="description" content="{{$blog->metadescription}}">
@php $collection = collect([]);
@endphp
@foreach($blog->tags->take(5) as $tag) 
@php $collection->push($tag->name);
@endphp
@endforeach
<meta name="keywords" content="{{collect($collection)->join(', ')}}">
<meta name="author" content="{{$blog->profile->user->name}}">
@stop
@section('share')
<div id="post-share">
    <h5>Share:</h5>
    <div class="social-media"><a href="#" style="background-color: #075ec8"><i class="fab fa-facebook-f"></i></a><a href="#" style="background-color: #40c4ff"><i class="fab fa-twitter"></i></a><a href="#" style="background-image: linear-gradient(to top, #f2a937, #d92e73, #9937b7, #4a66d3), linear-gradient(to top, #af00e1, #ff9e35)"><i class="fab fa-instagram"></i></a><a href="#" style="background-color: #ff0000"><i class="fab fa-youtube"></i></a></div>
</div>
@stop
@section('details')
<div class="post-standard__banner">
    <div class="post-standard__banner__image"><img src="https://avitex.vn/theme/gute/assets/images/post_detail/standard/banner.png" alt="Post banner image" /></div>
    <div class="post-standard__banner__content">
        <div class="post-card -center">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">{{$blog->category->name}}</h5><a class="card__content-title" href="{{route('blog.show', $blog->slug) }}">{{$blog->title}}</a>
                <div class="card__content-info">
                    <div class="info__time"><i class="far fa-clock"></i>
                        <p>Clock {{$blog->created_at}}</p>
                    </div>
                    <div class="info__comment"><i class="far fa-comment"></i>
                        <p>3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
{!! $blog->body !!}
<!-- <div class="post-card-quote -border">
    <div class="qoute__icon"><i class="fas fa-quote-left"></i></div>
    <p class="quote__content">Very little is needed to make a happy life; it is all within yourself, in your way of thinking.</p>
    <h5 class="quote__author">_Marcus Aurelius_</h5>

</div> -->
<p class="paragraph"></p>
@stop
@section('author')
<div class="post-footer__author">
    <div class="author__avatar"><img src="@if(is_null($blog->profile->avatar)) {{asset('assets/images/post_detail/author.png')}} @else {{$blog->profile->avatar}} @endif" /></div>
    <div class="author__info">
        <a href="{{route('profile.show',$blog->profile->profile_link)}}">{{$blog->profile->user->name}}</a>
        <p>{{$blog->profile->about_me}} </p>

        <div class="social-media">
            <a href="@if(is_null($blog->profile->facebook))@else{{$blog->profile->facebook}} @endif"><i class="fab fa-facebook-f"></i></a>
            <a href="@if(is_null($blog->profile->twitter))@else{{$blog->profile->twitter}} @endif"><i class="fab fa-twitter"></i></a>
            <a href="@if(is_null($blog->profile->instagram))@else{{$blog->profile->instagram}} @endif"><i class="fab fa-instagram"></i></a>
            <a href="@if(is_null($blog->profile->website))@else{{$blog->profile->website}} @endif"><i class="fab fa-dribbble"></i>
            </a>
        </div>
    </div>
</div>
@stop
@section('tags')
<div class="post-footer__tags center">
    <div class="tags-group">
        @foreach($tags as $tag)
        <a class="tag-btn" href="{{route('tag.show',$tag->slug)}}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
@stop
@section('previous_post')
@if($previous)
<div class="post-footer__related__item -prev"><a href="{{route('blog.show',$previous->slug)}}"> <i class="fas fa-chevron-left"></i>Previous posts</a>
    <div class="post-footer__related__item__content"><img src="https://avitex.vn/theme/gute/assets/images/posts/2.png" alt="Relate news image" />
        <div class="post-card ">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">{{$previous->category->name}}</h5><a class="card__content-title" href="{{route('blog.show',$previous->slug)}}">{{$previous->title}}</a>
            </div>
        </div>
    </div>
</div>
@endif
@stop
@section('next_post')
@if($next)
<div class="post-footer__related__item -next"><a href="{{route('blog.show',$next->slug)}}">
        Next posts<i class="fas fa-chevron-right"></i></a>
    <div class="post-footer__related__item__content">
        <div class="post-card -right">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">{{$next->category->name}}</h5><a class="card__content-title" href="{{route('blog.show',$next->slug)}}">{{$next->title}}</a>
            </div>
        </div><img src="https://avitex.vn/theme/gute/assets/images/posts/3.png" alt="Relate news image">
    </div>
</div>
@endif
@stop
@section('comments')
<div class="post-footer__comment">
    <h3 class="comment-title"> <span>3 comment</span></h3>
    <div class="post-footer__comment__detail">
    @foreach($comments as $comment)
        <div class="comment__item">
            <div class="comment__item__avatar"><img src="../assets/images/post_detail/avatar/3.png" alt="Author avatar" /></div>
            <div class="comment__item__content">
                <div class="comment__item__content__header">
                    <h5>{{$comment->user->name}}</h5>
                    <div class="data">
                        <p><i class="far fa-clock"></i>Aug,15, 2019</p>
                        <p><i class="far fa-heart"></i>0</p>
                        <p><i class="far fa-share-square"></i>0</p>
                    </div>
                </div>
                <p>{{$comment->comment}}</p>
            </div>
        </div>
        @endforeach
    </div>
    

</div>
@stop
@section('leavecomment')
<h3 class="comment-title"> <span>Leave a comment</span></h3>
<div class="post-footer__comment__form">
    @if(Auth::user())

    <form action="/">
        <textarea cols="30" rows="5" placeholder="comment" name="comment" id="comment"></textarea>
        <div class="center">
        <button class="btn -normal" id="commentSubmit">Submit</button>
    </div>
    </form>
    

    @else
    <div class="unauth">
        <button class="btn -normal" id="loginbutton">Login</button>
    </div>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="forms">
                <ul class="tab-group">
                    <li class="tab active"><a href="#login">Log In</a></li>
                    <li class="tab"><a href="#signup">Sign Up</a></li>
                </ul>
                <form action="javascript:void(0);" id="login">
                    <h1>Login on this site</h1>
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" id="loginemail" required="email" />
                        <label for="password">Password</label>
                        <input type="password" id="loginpassword" name="password" required />
                        <button class="btn -normal" id="loginSubmit">Login</button>
                        <a class="btn -normal" href="http://127.0.0.1:8000/login/google">Google</a>
                        <p class="text-p"> <a href="#">Forgot password?</a> </p>
                    </div>
                </form>
                <form action="javascript:void(0);" id="signup">
                    <h1>Sign Up on this site</h1>
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="registermail" required="email" />
                        <button class="btn -normal" id="registerSubmit">Register</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
@endif
@stop
@section('categories')
<div class="blog-sidebar-section -category">
    <div class="center-line-title">
        <h5>Categories</h5>
    </div>
    @foreach($categories as $key=>$category)
    <a class="category -bar " href="{{route('category.showslug',$category->slug)}}">
        <div class="category__background" style="background-image: url(https://avitex.vn/theme/gute/assets/images/backgrounds/category-{{$key+1}}.png)">
        </div>
        <h5 class="title">{{$category->name}}</h5>
        <h5 class="quantity">{{$category->posts->count()}}</h5>
    </a>
    @endforeach
</div>
@stop
@section('trending_post')
<div class="blog-sidebar-section -trending-post">
    <div class="center-line-title">
        <h5>Trending post</h5>
    </div>

    @foreach($trending_posts as $key =>$trending_post)
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">{{$key+1}}</div><img src="https://avitex.vn/theme/gute/assets/images/backgrounds/trending-post-{{$key+1}}.png" alt="Shifting to Vegan Diets May Cause Brain Nutrient..." />
        </div>
        <div class="trending-post_content">
            <h5></h5><a href="{{route('blog.show',$trending_post->slug)}}">{{$trending_post->title}}</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>{{$trending_post->created_at}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop
@section('subcribe')
<form class="subcribe-box subcribe-box" action="/" method="POST">
    <h5>Subcribe</h5>
    <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed tempor.</p>
    <input placeholder="Your email" name="email" type="email" /><a class="btn -normal" href="#">Subcribe</a>
</form>
@stop