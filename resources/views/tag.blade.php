@extends('layouts.front')
@section('title','Tag - '.$tag->name)
@section('breadcrumb')
<div class="breadcrumb">
    <ul>
        <li><a href="index.html"> <i class="fas fa-home"></i>Home</a></li>
        <li><a href="#">Blog</a></li>
        <li class="active"><a href="#">Tag</a></li>
    </ul>
</div>
@endsection
@section('category')
@endsection
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
    <div class="trending-post">
        <div class="trending-post_image">
            <div class="rank">2</div><img src="assets/images/backgrounds/trending-post-2.png" alt="The GQ Men Of The Year Awards 2019: Hrithik...">
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
            <div class="rank">3</div><img src="assets/images/backgrounds/trending-post-3.png" alt="Here's How Your Diet Can Help Yo Excel in Exams">
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
            <div class="rank">4</div><img src="assets/images/backgrounds/trending-post-4.png" alt="why others accept while AudioJungle...">
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
            <div class="rank">5</div><img src="assets/images/backgrounds/trending-post-5.png" alt="Podcast audio episode with YouTube license question">
        </div>
        <div class="trending-post_content">
            <h5>Typography</h5><a href="post_standard.html">Podcast audio episode with YouTube license question</a>
            <div class="info__time"><i class="far fa-clock"></i>
                <p>Seb 27, 2019</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('posts')
<div class="category__header">
    <div class="category__header__text">
        <h5>Tag:</h5><a href="#">{{$tag->name}}</a>
    </div>
</div>
<div class="category_content">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-12">
            <div class="post-card -small -horizontal"><a class="card__cover" href="{{route('blog.show',$post->slug)}}" tabindex="0"><img src="{{asset('assets/images/posts/1.png')}}" alt="{{$post->name}}"></a>
                <div class="card__content">
                    <h5 class="card__content-category">{{$tag->name}}</h5>
                    <a class="card__content-title" href="{{route('blog.show',$post->slug)}}" tabindex="0">{{$post->title}}</a>
                    <div class="card__content-info">
                        <div class="info__time"><i class="far fa-clock"></i>
                            <p>Clock Wed 02, 2019</p>
                        </div>
                        <div class="info__comment"><i class="far fa-comment"></i>
                            <p>3</p>
                        </div>
                    </div>
                    <p class="card__content-description">{{$post->description}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $posts->links('vendor.pagination.pagination') }}
@endsection