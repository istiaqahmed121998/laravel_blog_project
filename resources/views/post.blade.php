@extends('layouts.blog')
@section('title', 'Homepage')
@section('meta')
@stop
@section('share')
<div id="post-share">
    <h5>Share:</h5>
    <div class="social-media"><a href="#" style="background-color: #075ec8"><i class="fab fa-facebook-f"></i></a><a href="#" style="background-color: #40c4ff"><i class="fab fa-twitter"></i></a><a href="#" style="background-image: linear-gradient(to top, #f2a937, #d92e73, #9937b7, #4a66d3), linear-gradient(to top, #af00e1, #ff9e35)"><i class="fab fa-instagram"></i></a><a href="#" style="background-color: #ff0000"><i class="fab fa-youtube"></i></a></div>
</div>
@stop
@section('details')
<div class="post-standard__banner">
    <div class="post-standard__banner__image"><img src="{{asset('assets/images/post_detail/standard/banner.png')}}" alt="Post banner image" /></div>
    <div class="post-standard__banner__content">
        <div class="post-card -center">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">Typography</h5><a class="card__content-title" href="{{route('blog.show', $blog->slug) }}">{{$blog->title}}</a>
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
    <div class="author__avatar"><img src="assets/images/post_detail/author.png" alt="Author avatar" /></div>
    <div class="author__info">
        <h5>Lena Mollein</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse vel facilisis. </p>
        <div class="social-media"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-dribbble"></i></a></div>
    </div>
</div>
@stop
@section('tags')
<div class="post-footer__tags center">
    <div class="tags-group"><a class="tag-btn" href="blog_category_grid.html">Gutenews</a><a class="tag-btn" href="blog_category_grid.html">Lifestyle</a><a class="tag-btn" href="blog_category_grid.html">Fashion</a><a class="tag-btn" href="blog_category_grid.html">Technology</a><a class="tag-btn" href="blog_category_grid.html">Food</a>
    </div>
</div>
@stop
@section('previous_post')
<div class="post-footer__related__item -prev"><a href="post_standard.html"> <i class="fas fa-chevron-left"></i>Previous posts</a>
    <div class="post-footer__related__item__content"><img src="assets/images/posts/2.png" alt="Relate news image" />
        <div class="post-card ">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">Typography</h5><a class="card__content-title" href="post_standard.html">How to name, save and export a finish template</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('next_post')
<div class="post-footer__related__item -next"><a href="post_standard.html">
        Next posts<i class="fas fa-chevron-right"></i></a>
    <div class="post-footer__related__item__content">
        <div class="post-card -right">
            <div></div>
            <div class="card__content">
                <h5 class="card__content-category">Graphic</h5><a class="card__content-title" href="post_standard.html">I want to create a logo with illustrator hacker</a>
            </div>
        </div><img src="assets/images/posts/3.png" alt="Relate news image" />
    </div>
</div>
@stop
@section('comments')
<div class="post-footer__comment">
    <h3 class="comment-title"> <span>3 comment</span></h3>
    <div class="post-footer__comment__detail">
        <div class="comment__item">
            <div class="comment__item__avatar"><img src="assets/images/post_detail/avatar/1.png" alt="Author avatar" /></div>
            <div class="comment__item__content">
                <div class="comment__item__content__header">
                    <h5>Brandon Kelley</h5>
                    <div class="data">
                        <p><i class="far fa-clock"></i>Aug,15, 2019</p>
                        <p><i class="far fa-heart"></i>12</p>
                        <p><i class="far fa-share-square"></i>1</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis.</p>
            </div>
            <div class="comment__item__reply">
                <div class="comment__item">
                    <div class="comment__item__avatar"><img src="assets/images/post_detail/avatar/2.png" alt="Author avatar" /></div>
                    <div class="comment__item__content">
                        <div class="comment__item__content__header">
                            <h5>Brandon Kelley</h5>
                            <div class="data">
                                <p><i class="far fa-clock"></i>Aug,15, 2019</p>
                                <p><i class="far fa-heart"></i>12</p>
                                <p><i class="far fa-share-square"></i>1</p>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis ipsum suspendisse ultrices gravida lacus vel facilisis, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment__item">
            <div class="comment__item__avatar"><img src="assets/images/post_detail/avatar/3.png" alt="Author avatar" /></div>
            <div class="comment__item__content">
                <div class="comment__item__content__header">
                    <h5>Brandon Kelley</h5>
                    <div class="data">
                        <p><i class="far fa-clock"></i>Aug,15, 2019</p>
                        <p><i class="far fa-heart"></i>12</p>
                        <p><i class="far fa-share-square"></i>1</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis.</p>
            </div>
        </div>
    </div>

</div>
@stop
@section('leavecomment')
<h3 class="comment-title"> <span>Leave a comment</span></h3>
<div class="post-footer__comment__form">
    <form action="/">
        <div class="row">
            <div class="col-12 col-sm-4">
                <input type="text" placeholder="Name" name="name" />
            </div>
            <div class="col-12 col-sm-4">
                <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="col-12 col-sm-4">
                <input type="text" placeholder="Webiste" name="website" />
            </div>
        </div>
        <textarea cols="30" rows="5" placeholder="Messages" name="message"></textarea>
    </form>
    <div class="center">
        <button class="btn -normal">Submit</button>
    </div>
</div>
@stop
@section('categories')
<div class="blog-sidebar-section -category">
    <div class="center-line-title">
        <h5>Categories</h5>
    </div><a class="category -bar " href="blog_category_grid.html">
        <div class="category__background" style="background-image: url(assets/images/backgrounds/category-1.png)"></div>
        <h5 class="title">Design</h5>
        <h5 class="quantity">12</h5>
    </a><a class="category -bar " href="blog_category_grid.html">
        <div class="category__background" style="background-image: url(assets/images/backgrounds/category-2.png)"></div>
        <h5 class="title">Graphic</h5>
        <h5 class="quantity">6</h5>
    </a><a class="category -bar " href="blog_category_grid.html">
        <div class="category__background" style="background-image: url(assets/images/backgrounds/category-3.png)"></div>
        <h5 class="title">Illustrator</h5>
        <h5 class="quantity">15</h5>
    </a><a class="category -bar " href="blog_category_grid.html">
        <div class="category__background" style="background-image: url(assets/images/backgrounds/category-4.png)"></div>
        <h5 class="title">Typography</h5>
        <h5 class="quantity">8</h5>
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
            <div class="rank">1</div><img src="assets/images/backgrounds/trending-post-1.png" alt="Shifting to Vegan Diets May Cause Brain Nutrient..." />
        </div>
        <div class="trending-post_content">
            <h5>Illustrator</h5><a href="post_standard.html">Shifting to Vegan Diets May Cause Brain Nutrient...</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">2</div><img src="assets/images/backgrounds/trending-post-2.png" alt="The GQ Men Of The Year Awards 2019: Hrithik..." />
        </div>
        <div class="trending-post_content">
            <h5>Design</h5><a href="post_standard.html">The GQ Men Of The Year Awards 2019: Hrithik...</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">3</div><img src="assets/images/backgrounds/trending-post-3.png" alt="Here's How Your Diet Can Help Yo Excel in Exams" />
        </div>
        <div class="trending-post_content">
            <h5>Illustrator</h5><a href="post_standard.html">Here's How Your Diet Can Help Yo Excel in Exams</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">4</div><img src="assets/images/backgrounds/trending-post-4.png" alt="why others accept while AudioJungle..." />
        </div>
        <div class="trending-post_content">
            <h5>Graphic</h5><a href="post_standard.html">why others accept while AudioJungle...</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">5</div><img src="assets/images/backgrounds/trending-post-5.png" alt="Podcast audio episode with YouTube license question" />
        </div>
        <div class="trending-post_content">
            <h5>Typography</h5><a href="post_standard.html">Podcast audio episode with YouTube license question</a>
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
    <input placeholder="Your email" name="email" type="email" /><a class="btn -normal" href="#">Subcribe</a>
</form>
@stop