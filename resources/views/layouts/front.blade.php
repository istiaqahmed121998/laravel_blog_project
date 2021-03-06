<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Blog - @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" />
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css" />
    <link rel="shortcut icon" type="image/png" href="../assets/images/fav.png" />
    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="{{asset('assets/css/elegant.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/custom_bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plyr.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!--endbuild-->
</head>

<body>
    <div id="load">
        <div class="load__content">
            <div class="load__icon"><img src="{{asset('assets/images/icons/load.gif')}}" alt="Loading icon" /></div>
        </div>
    </div>
    <header class="theme-default">
        <div id="search-box">
            <div class="container">
                <form action="/" method="POST">
                    <input type="text" placeholder="Searching for news" name="search" />
                    <button><i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="header-wrapper"><a class="header__logo" href="{{url('/')}}"><img src="../assets/images/logo.png" alt="Logo" /></a>
                <nav>
                    <ul>
                        <li class="nav-item"><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item active"><a href="{{url('/')}}">Blog</a>
                        </li>
                        <li class="nav-item"><a href="#">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a href="author.html">AUTHOR</a></li>
                                <li><a href="about.html">ABOUT</a></li>
                                <li><a href="contact.html">CONTACT</a></li>
                                <li><a href="shop.html">SHOP</a></li>
                                <li><a href="product_detail.html">PRODUCT DETAIL</a></li>
                                <li><a href="cart.html">CART</a></li>
                                <li><a href="checkout.html">CHECKOUT</a></li>
                                <li><a href="error_404.html">ERROR</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="about.html">About</a></li>
                        <li class="nav-item"><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <div class="header__icon-group"><a href="#" id="search"><i class="fas fa-search"></i></a>
                    <div class="social"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-dribbble"></i></a><a id="mobile-menu-controller" href="#"><i class="fas fa-bars"></i></a></div>
                </div>
            </div>
        </div>
    </header>
    <div class="no-pd" id="content">
        <div class="container">
            @yield('breadcrumb')
            @yield('extra')
            <div class="category">

                <div class="row">
                    <div class="col-12 col-md-5 col-lg-4 order-md-2">
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-section -category">
                                <div class="center-line-title">
                                    <h5>Categories</h5>
                                </div>
                                @foreach($categories as $category)
                                <a class="category -bar " href="{{route('category.showslug',$category->slug)}}">
                                    <div class="category__background" style="background-image: url(https://avitex.vn/theme/gute/assets/images/backgrounds/category-1.png)">
                                    </div>
                                    <h5 class="title">{{$category->name}}</h5>
                                    <h5 class="quantity">{{$category->posts->count()}}</h5>
                                </a>
                                @endforeach
                            </div>
                            @yield('trending_post')
                            <form class="subcribe-box subcribe-box" action="/" method="POST">
                                <h5>Subcribe</h5>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed tempor.</p>
                                <input placeholder="Your email" name="email" type="email"><a class="btn -normal" href="#">Subcribe</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-8 order-md-1">
                        
                        @yield('posts')
                    </div>
                </div>
            </div>
            <div class="instagrams">
                <div class="instagrams-container"><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/1.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/2.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/3.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/4.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/5.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/1.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/3.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a><a class="instagrams-item" href="https://www.instagram.com/"><img src="{{asset('assets/images/instagram/4.png')}}" alt="Instagram image" />
                        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                            <p>@ Gtute_News</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer-col -about">
                            <div class="center-line-title">
                                <h5>About us</h5>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis. </p>
                            <div class="contact-method">
                                <p> <i class="fas fa-map-marker-alt"></i>5 South Main Street Los Angeles, ZZ-96110 USA</p>
                                <p> <i class="far fa-mobile-android"></i>125-711-811 | 125-668-886</p>
                                <p> <i class="fas fa-headphones-alt"></i>Support.hosting@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer-col -feature-post">
                            <div class="center-line-title">
                                <h5>Feature posts</h5>
                            </div>
                            <div class="feature-post-block">
                                <div class="post-card -tiny"><a class="card__cover" href="post_standard.html"><img src="assets/images/posts/1.png" alt="Looking for some feedback for this rejected track" /></a>
                                    <div class="card__content">
                                        <h5 class="card__content-category">Technology</h5><a class="card__content-title" href="post_standard.html">Looking for some feedback for this rejected track</a>
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
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="footer-col -util">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="center-line-title">
                                        <h5>Tag clouds</h5>
                                    </div>
                                    <div class="tags-group">
                                    @foreach($tags as $tag)
                                    <a class="tag-btn" href="{{route('tag.show',$tag->slug)}}">{{$tag->name}}</a>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="center-line-title">
                                        <h5>Follow us</h5>
                                    </div>
                                    <div class="social-block"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-dribbble"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>© 2019, GuteNews - News Magazine WordPress Theme. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!--build:js assets/js/main.min.js-->
    <script rel="script/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/slick.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/plyr.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/vimeo.player.min.js')}}"></script>
    <script rel="script/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <!--endbuild-->
</body>

</html>