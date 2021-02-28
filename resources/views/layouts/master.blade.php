<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('meta')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" />
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css" />
    <link rel="shortcut icon" type="image/png" href="./assets/images/fav.png" />
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
</head>

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
        <div class="header-wrapper"><a class="header__logo" href="{{ url('/') }}"><img src="./assets/images/logo.png" alt="Logo" /></a>
            <nav>
                <ul>
                    <li class="nav-item active"><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item"><a>Blog</a>
                        <ul class="dropdown-menu">
                            <li><a href="blog_category_grid.html">BLOG CATEGORY GRID</a></li>
                            <li><a href="blog_category_list.html">BLOG CATEGORY LIST</a></li>
                            <li><a href="post_standard.html">POST STANDARD</a></li>
                            <li><a href="post_standard_image_full.html">POST STANDARD IMAGE FULLWIDTH</a></li>
                            <li><a href="post_standard_sidebar.html">POST STANDARD SIDEBAR</a></li>
                            <li><a href="post_gallery.html">POST GALLERY</a></li>
                            <li><a href="post_video.html">POST VIDEO</a></li>
                            <li><a href="post_audio.html">POST AUDIO</a></li>
                            <li><a href="post_quote.html">POST QUOTE</a></li>
                        </ul>
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
<div id="load">
    <div class="load__content">
        <div class="load__icon"><img src="{{asset('assets/images/icons/load.gif')}}" alt="Loading icon" /></div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="blog-with-sidebar">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4 order-md-2">
                    <div class="blog-sidebar">
                        @yield('categories')
                        @yield('trending_post')
                        @yield('subcribe')
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        @yield('instagram')
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
                    @yield('feature_post')
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="footer-col -util">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div Lorem ipsum dolor sit amet,class="center-line-title">
                                    <h5>Tag clouds</h5>
                                </div>
                                <div class="tags-group"><a class="tag-btn" href="blog_category_grid.html">Gutenews</a><a class="tag-btn" href="blog_category_grid.html">Lifestyle</a><a class="tag-btn" href="blog_category_grid.html">Fashion</a><a class="tag-btn" href="blog_category_grid.html">Technology</a><a class="tag-btn" href="blog_category_grid.html">Food</a><a class="tag-btn" href="blog_category_grid.html">Travel</a>
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
            <p>© 2021, By Zenith Jhony. All rights reserved.</p>
        </div>
    </div>
</footer>
<script src="{{asset('js/main.min.js')}}"></script>
@yield('pagejs')
</html>