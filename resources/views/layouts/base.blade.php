<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    @yield('extra-meta')
    <title>Fdl's shop </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon/favicon.png" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet" />

    <!-- CSS
  ============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/ionicons.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/simple-line-icons.css">
        <link rel="stylesheet" href="/assets/css/vendor/font-awesome.min.css"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="/assets/css/plugins/animate.css">
        <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/swiper.css">  -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="/assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="/assets/css/style.min.css">
    @include('layouts.google-translate')

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="/assets/css/style.css" /> -->
</head>

<body>
    <!-- Header Section Start From Here -->
    <header class="header-wrapper">
        <!-- Header Nav Start -->
        <div class="header-nav">
            <div class="container">
                <div class="header-nav-wrapper d-md-flex d-sm-flex d-xl-flex d-lg-flex justify-content-between">
                    <div class="header-static-nav">
                        <p>Welcome to Fadel's e-commerce ! Go to <a href="{{route('admin_login')}}">Admin</a> to access the administration panel</p><br>
                    </div>
                    <div class="header-menu-nav">
                        <ul class="menu-nav">
                            <!-- <li>
                                <div class="dropdown">
                                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting <i class="ion-ios-arrow-down"></i></button>
                                    <ul class="dropdown-menu animation slideDownIn" aria-labelledby="dropdownMenuButton">
                                        <li><a href="my-account  ">My account</a></li>
                                        <li><a href="checkout  ">Checkout</a></li>
                                        <li><a href="login  ">Sign in</a></li>
                                    </ul>
                                </div>
                            </li> -->
                            <li class="pr-0">
                                <div class="dropdown">
                                    @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                                        @else
                                        <a href="{{ route('login') }}">Log in</a>
                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                        @endif
                                        @endauth
                                    </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Nav End -->
        <div class="header-top bg-white ptb-30px d-xl-block d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <a href="index  "><img class="img-responsive" src="/assets/images/logo/logo.jpg" alt="logo.jpg" /></a>
                        </div>
                    </div>
                    <div class="col-md-10 align-self-center">
                        <div class="header-right-element d-flex">
                            @include('partials.search')
                            <!--Cart info Start -->
                            <div class="header-tools d-flex">
                                <div class="cart-info d-flex align-self-center">
                                    <a href="{{route('seecomp')}}" class="shuffle" data-number="{{Cart::instance('compare')->count()}}"><i class="icon-shuffle"></i></a>
                                    <a href="#offcanvas-wishlist" class="heart offcanvas-toggle" data-number="{{Cart::instance('wishlist')->count()}}"><i class="icon-heart"></i></a>
                                    <a href="#offcanvas-cart" class="bag offcanvas-toggle" data-number="{{Cart::instance('default')->count()}}"><i class="icon-bag"></i><span>{{Cart::instance('default')->subtotal()/100}}</span></a>
                                </div>
                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Nav End -->
        <div class="header-menu bg-blue sticky-nav d-xl-block d-none padding-0px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 custom-col-2">
                        <div class="header-menu-vertical">
                            <h4 class="menu-title"><a href="/" style="color: white;">Home</a></h4>

                            <!-- menu content -->
                        </div>
                        <!-- header menu vertical -->
                    </div>
                    <!-- <div class="col-lg-9 custom-col-2">
                        <div class="header-horizontal-menu">
                            <ul class="menu-content">
                                <li class="active menu-dropdown">
                                    <a href="/">Home <i class="ion-ios-arrow-down"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- header menu -->
    </header>
    <!-- Header Section End Here -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header d-xl-none sticky-nav bg-white ptb-10px">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="/"><img class="img-responsive" src="/assets/images/logo/logo.jpg" alt="logo.jpg" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="cart-info d-flex align-self-center">
                            <a href="compare  " class="shuffle d-xs-none" data-number="3"><i class="icon-shuffle"></i></a>
                            <a href="#offcanvas-wishlist" class="heart offcanvas-toggle d-xs-none" data-number=""><i class="icon-heart"></i></a>
                            <a href="#offcanvas-cart" class="bag offcanvas-toggle" data-number="{{Cart::instance('default')->count()}}"><i class="icon-bag">{{Cart::instance('default')->subtotal()/100}}</i><span></span></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>

    <!-- Search Category Start -->
    <div class="mobile-search-area d-xl-none mb-15px">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-12">
                    <div class="search-element media-body">
                        <form class="d-flex" action="#">
                            <div class="search-category">
                            </div>
                            <input type="text" placeholder="Enter your search key ... " />
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Search Category End -->
    <div class="mobile-category-nav d-xl-none mb-15px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!--=======  category menu  =======-->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->


                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <li class="menu-item-has-children menu-item-has-children-1">
                                    <a href="#">Accessories & Parts<i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                     <ul class="category-mega-menu category-mega-menu-1">
                                        <li><a href="#">Cables & Adapters</a></li>
                                        <li><a href="#">Batteries</a></li>
                                        <li><a href="#">Chargers</a></li>
                                        <li><a href="#">Bags & Cases</a></li>
                                        <li><a href="#">Electronic Cigarettes</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-2">
                                    <a href="#">Camera & Photo<i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-2">
                                        <li><a href="#">Digital Cameras</a></li>
                                        <li><a href="#">Camcorders</a></li>
                                        <li><a href="#">Camera Drones</a></li>
                                        <li><a href="#">Action Cameras</a></li>
                                        <li><a href="#">Photo Studio Supplies</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-3">
                                    <a href="#">Smart Electronics <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-3">
                                        <li><a href="#">Wearable Devices</a></li>
                                        <li><a href="#">Smart Home Appliances</a></li>
                                        <li><a href="#">Smart Remote Controls</a></li>
                                        <li><a href="#">Smart Watches</a></li>
                                        <li><a href="#">Smart Wristbands</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-4">
                                    <a href="#">Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-4">
                                        <li><a href="#">Televisions</a></li>
                                        <li><a href="#">TV Receivers</a></li>
                                        <li><a href="#">Projectors</a></li>
                                        <li><a href="#">Audio Amplifier Boards</a></li>
                                        <li><a href="#">TV Sticks</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-5">
                                    <a href="#">Portable Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-5">
                                        <li><a href="#">Headphones</a></li>
                                        <li><a href="#">Speakers</a></li>
                                        <li><a href="#">MP3 Players</a></li>
                                        <li><a href="#">VR/AR Devices</a></li>
                                        <li><a href="#">Microphones</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-6">
                                    <a href="#">Video Game <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-6">
                                        <li><a href="#">Handheld Game Players</a></li>
                                        <li><a href="#">Game Controllers</a></li>
                                        <li><a href="#">Joysticks</a></li>
                                        <li><a href="#">Stickers</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Televisions</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Wearable Devices</a></li>
                                <li><a href="#">Smart Watches</a></li>
                                <li><a href="#">Game Controllers</a></li>
                                <li><a href="#"> Smart Home Appliances</a></li>
                                <li class="hidden"><a href="#">Projectors</a></li>
                                <li>
                                    <a href="#" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More Categories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!--=======  End of category menu =======-->
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->
    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @foreach (Cart::instance('wishlist')->content() as $procart)
                    <li>
                        <a href="single-product  " class="image"><img src="/{{$procart->options->image}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="{{route('p.show',['slug'=>$procart->options->slug])}}" class="title">{{$procart->name}}</a>
                            <span class="quantity-price">{{$procart->qty}} x <span class="amount">{{$procart->price/100}}</span></span>
                            <a href="{{route('remove',['id'=>$procart->rowId])}}" class="remove">×</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="{{route('seewish')}}" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @foreach (Cart::instance('default')->content() as $procart)
                    <li>
                        <a href="single-product  " class="image"><img src="/{{$procart->options->image}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="{{route('p.show',['slug'=>$procart->options->slug])}}" class="title">{{$procart->name}}</a>
                            <span class="quantity-price">{{$procart->qty}} x <span class="amount">{{$procart->price}}</span></span>
                            <a href="{{route('remove',['id'=>$procart->rowId])}}" class="remove">×</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount">{{Cart::instance('default')->subtotal()/100}}</span>
                </div>
                <div class="buttons">
                    <a href="{{route('cart.show')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="{{route('checkout')}}" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="head">
                <span class="title">&nbsp;</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="#"><span class="menu-text">Home</span></a>
                        <ul class="sub-menu">
                            <li><a href="index  "><span class="menu-text">Home 1</span></a></li>
                            <li><a href="index-2  "><span class="menu-text">Home 2</span></a></li>
                            <li> <a href="index-3  "><span class="menu-text">Home 3</span></a></li>
                            <li><a href="index-4  "><span class="menu-text">Home 4</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Shop</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><span class="menu-text">Shop Grid</span></a>
                                <ul class="sub-menu">
                                    <li><a href="shop-3-column  ">Shop Grid 3 Column</a></li>
                                    <li><a href="shop-4-column  ">Shop Grid 4 Column</a></li>
                                    <li><a href="shop-left-sidebar  ">Shop Grid Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar  ">Shop Grid Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Shop List</span></a>
                                <ul class="sub-menu">
                                    <li><a href="shop-list  ">Shop List</a></li>
                                    <li><a href="shop-list-left-sidebar  ">Shop List Left Sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar  ">Shop List Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Shop Single</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product  ">Shop Single</a></li>
                                    <li><a href="single-product-variable  ">Shop Variable</a></li>
                                    <li><a href="single-product-affiliate  ">Shop Affiliate</a></li>
                                    <li><a href="single-product-group  ">Shop Group</a></li>
                                    <li><a href="single-product-tabstyle-2  ">Shop Tab 2</a></li>
                                    <li><a href="single-product-tabstyle-3  ">Shop Tab 3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Shop Single</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product-slider  ">Shop Slider</a></li>
                                    <li><a href="single-product-gallery-left  ">Shop Gallery Left</a></li>
                                    <li><a href="single-product-gallery-right  ">Shop Gallery Right</a></li>
                                    <li><a href="single-product-sticky-left  ">Shop Sticky Left</a></li>
                                    <li><a href="single-product-sticky-right  ">Shop Sticky Right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Pages</span></a>
                        <ul class="sub-menu">
                            <li><a href="about  ">About Page</a></li>
                            <li><a href="cart  ">Cart Page</a></li>
                            <li><a href="checkout  ">Checkout Page</a></li>
                            <li><a href="compare  ">Compare Page</a></li>
                            <li><a href="login  ">Login & Register Page</a></li>
                            <li><a href="my-account  ">Account Page</a></li>
                            <li><a href="wishlist  ">Wishlist Page</a></li>
                            <li><a href="thank-you-page  ">Thank You Page</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Blog</span></a>
                        <ul class="sub-menu">
                            <li><a href="#"><span class="menu-text">Blog Grid</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid-left-sidebar  ">Blog Grid Left Sidebar</a></li>
                                    <li><a href="blog-grid-right-sidebar  ">Blog Grid Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Blog List</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list-left-sidebar  ">Blog List Left Sidebar</a></li>
                                    <li><a href="blog-list-right-sidebar  ">Blog List Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Blog Single</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-single-left-sidebar  ">Blog Single Left Sidebar</a></li>
                                    <li><a href="blog-single-right-sidebar  ">Blog Single Right Sidbar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact  ">Contact Us</a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons mt-30px">
                <div class="header-tools d-flex">
                    <div class="cart-info d-flex align-self-center">
                        <a href="my-account  " class="user"><i class="icon-user"></i></a>
                        <a href="wishlist  " data-number="3"><i class="icon-heart"></i></a>
                        <a href="cart  " data-number="3"><i class="icon-bag"></i></a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-social mt-30px">
                <ul>
                    <li>
                        <a href="#"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->

    <div class="offcanvas-overlay"></div>
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="/">@yield('t1')</a></li>
                            <li>@yield('t2')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->
    <!-- Shop Category Area End -->
    @yield('content')
    <!-- Shop Category Area End -->
    <!-- Footer Area Start -->
    <div class="footer-area">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">ABOUT US</h4>
                                <p class="text-infor">This project has been done with a HTML/CSS template.I have implemented the back end features with the PHP framework:Laravel v8</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <p class="copy-text"> © 2021 <strong>Fadel Mohamed</strong> Made With <i class="fa fa-heart" style="color: red;" aria-hidden="true"></i> and <a class="company-name" href="https://hasthemes.com/">
                                    <strong> Laravel v8</strong></a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-100px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/11.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/12.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/13.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/14.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/11.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/12.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/13.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="/assets/images/product-image/14.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Originals Kaval Windbr</h2>
                                <p class="reference">Reference:<span> demo_17</span></p>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                                <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                                <div class="pro-details-size-color">
                                    <div class="pro-details-color-wrap">
                                        <span>Color</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="blue"></li>
                                                <li class="maroon active"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="wishlist  "><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="compare  "><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <script src="/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!-- Plugins JS -->
    <script src="/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="/assets/js/plugins/swiper.min.js"></script>
    <script src="/assets/js/plugins/countdown.js"></script>
    <script src="/assets/js/plugins/scrollup.js"></script>
    <script src="/assets/js/plugins/elevateZoom.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="/assets/js/vendor/vendor.min.js"></script>
        <script src="/assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main Activation JS -->
    <script src="/assets/js/main.js"></script>
    @yield('extra-js')
</body>

</html>
