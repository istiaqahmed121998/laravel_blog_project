@extends('layouts.master')
@section('title', 'Homepage')
@section('meta')
@stop
@section('content')
<div class="col-12 col-md-7 col-lg-8 order-md-1">
    <div class="row">
        <div class="col-sm-6 col-md-12">
            @foreach($blogs ?? '' as $blog)
            <div class="post-card -full -center"><a class="card__cover" href="{{route('blog.show', $blog->slug) }}"><img src="assets/images/posts/1.png" alt="Looking for some feedback for this rejected track" /></a>
                <div class="card__content">
                    <h5 class="card__content-category">Technology</h5>
                    <a class="card__content-title" href="{{route('blog.show', $blog->slug) }}">{{$blog->title}}</a>
                    <div class="card__content-info">
                        <div class="info__time info__author"><i class="far fa-user"></i>
                            <p>Jessica Stephens</p>
                        </div>
                        <div class="info__time"><i class="far fa-clock"></i>
                            <p>Clock Wed 02, 2019</p>
                        </div>
                        <div class="info__comment"><i class="far fa-comment"></i>
                            <p>3</p>
                        </div>
                    </div>
                    <p class="card__content-description">{{$blog->body}}</p><a class="more-btn" href="post_standard.html">Read more </a>
                </div>
            </div>
            @endforeach
            <div class="center" style="padding:20px">
                <div class="pagination">
                    <ul>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li class="pagination__page-number"><a href="javascript:void(0)">2</a></li>
                        <li class="pagination__page-number"><a href="javascript:void(0)">3</a></li>
                        <li><a class="next" href="javascript:void(0)">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('categories')
<div class="blog-sidebar-section -category">
    <div class="center-line-title">
        <h5>Categories</h5>
    </div>
    <a class="category -bar " href="blog_category_grid.html">
        <div class="category__background" style="background-image: url(assets/images/backgrounds/category-1.png)">
        </div>
        <h5 class="title">Design</h5>
        <h5 class="quantity">12</h5>
    </a>
</div>
@stop
@section('trending_post')
<div class="blog-sidebar-section -trending-post">
    <div class="center-line-title">
        <h5>Trending post</h5>
    </div>
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">1</div><img src="assets/images/backgrounds/trending-post-1.png" alt="Shifting to Vegan Diets May Cause Brain Nutrient...">
        </div>
        <div class="trending-post_content">
            <h5>Illustrator</h5><a href="post_standard.html">Shifting to Vegan Diets May Cause Brain Nutrient...</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
</div>
@stop
@section('subcribe')
<form class="subcribe-box subcribe-box" action="/" method="POST">
    <h5>Subcribe</h5>
    <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed tempor.</p>
    <input placeholder="Your email" name="email" type="email">
    <a class="btn -normal" href="#">Subcribe</a>
</form>
@stop
@section('instagram')
<div class="instagrams">
    <div class="instagrams-container">
        <a class="instagrams-item" href="https://www.instagram.com/"><img src="assets/images/instagram/1.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/">
            <img src="assets/images/instagram/2.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/">
            <img src="assets/images/instagram/3.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/">
            <img src="assets/images/instagram/4.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/">
            <img src="assets/images/instagram/5.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/">
            <img src="assets/images/instagram/1.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/"><img src="assets/images/instagram/3.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
        <a class="instagrams-item" href="https://www.instagram.com/"><img src="assets/images/instagram/4.png" alt="Instagram image" />
            <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
            </div>
        </a>
    </div>
</div>
@stop
@section('feature_post')
<div class="footer-col -feature-post">
    <div class="center-line-title">
        <h5>Feature posts</h5>
    </div>
    <div class="feature-post-block">
        <div class="post-card -tiny"><a class="card__cover" href="post_standard.html"><img src="assets/images/posts/1.png" alt="Looking for some feedback for this rejected track" /></a>
            <div class="card__content">
                <h5 class="card__content-category">Technology</h5><a class="card__content-title" href="post_standard.html">Looking for some feedback for this rejected</a>
                <div class="card__content-info">
                    <div class="info__time"><i class="far fa-clock"></i>
                        <p>Clock Wed 02, 2019</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-card -tiny"><a class="card__cover" href="post_standard.html"><img src="assets/images/posts/2.png" alt="How to name, save and export a finish template" /></a>
            <div class="card__content">
                <h5 class="card__content-category">Typography</h5><a class="card__content-title" href="post_standard.html">How to name, save and export a finish template</a>
                <div class="card__content-info">
                    <div class="info__time"><i class="far fa-clock"></i>
                        <p>Clock Wed 02, 2019</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-card -tiny"><a class="card__cover" href="post_standard.html"><img src="assets/images/posts/3.png" alt="I want to create a logo with illustrator hacker" /></a>
            <div class="card__content">
                <h5 class="card__content-category">Graphic</h5><a class="card__content-title" href="post_standard.html">I want to create a logo with illustrator hacker</a>
                <div class="card__content-info">
                    <div class="info__time"><i class="far fa-clock"></i>
                        <p>Clock Wed 02, 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop