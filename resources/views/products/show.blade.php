@extends('layouts.base')
@section('t1','Home')
@section('t2','Single product')
@section('content')
<section class="product-details-area mtb-60px">
    @foreach ($singles as $single)
    <div class="container">
        @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-img product-details-tab">
                    <div class="zoompro-wrap zoompro-2">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="/{{$single->image}}" data-zoom-image="/{{$single->image}}" alt="" />
                        </div>
                    </div>
                    <div id="gallery" class="product-dec-slider-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a class="active" data-image="/{{$single->image}}" data-zoom-image="/{{$single->image}}">
                                    <img class="img-responsive" src="/{{$single->image}}" alt="" />
                                </a>
                            </div>
                            @foreach ($images as $image)
                            <div class="swiper-slide">
                                <a class="active" data-image="/{{$image->img}}" data-zoom-image="/{{$image->img}}">
                                    <img class="img-responsive" src="/{{$image->img}}" alt="" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h2>{{$single->title}}</h2>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            {{$single->getRating()}}
                        </div>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">{{getPrice($single->price)}}</li>
                        </ul>
                    </div>
                    <div class="pro-details-list">
                        <p>{{$single->subtitle}}</p>
                    </div>
                    <form action="{{route('cartadd')}}" method="post">
                        @csrf
                        <div class="pro-details-quality mt-0px">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qty" value="1" />
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <input type="hidden" name="id" value="{{$single->id}}">
                                <a href="#"><input type="submit" value="Add To Cart"></a>
                            </div>
                    </form>
                </div>
                <div class="pro-details-wish-com">
                    <div class="pro-details-wishlist">
                        <a href="{{route('addToWishlist',['id'=>$single->id])}}"><i class="icon-heart"></i>Add to wishlist</a>
                    </div>
                    <div class="pro-details-compare">
                        <a href="{{route('addToCompare',['id'=>$single->id])}}"><i class="icon-shuffle"></i>Add to compare</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach
</section>
<!-- Shop details Area End -->
<!-- product details description area start -->
<div class="description-review-area mb-60px">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">Description</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <ul>

                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    <div class="product-description-wrapper">
                        <p>{{$single->description}}</p>

                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <input type="submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->
<!-- Feature Area start -->
<div class="feature-area single-product-responsive mt-60px mb-30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="section-heading">You Might Also Like</h2>
                </div>
            </div>
        </div>
        <div class="feature-slider-two slider-nav-style-1">
            <div class="feature-slider-wrapper swiper-wrapper">
                @foreach ($sames as $same)
                <div class="feature-slider-item swiper-slide">
                    <article class="list-product">
                        <div class="img-block">
                            <a href="single-product.html" class="thumbnail">
                                <img class="first-img" src="/{{$same->image}}" alt="" />
                                <img class="second-img" src="/{{$same->image}}" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-magnifier icons"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="{{route('p.show',['slug'=>$same->slug])}}"><span>{{$same->title}}</span></a>
                            <h2><a href="single-product.html" class="product-link">{{$same->subtitle}}</a></h2>
                            <div class="rating-product">
                                {{$same->getRating()}}
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">{{getPrice($same->price)}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="{{route('addOneInCart',['id'=>$same->id])}}">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                </li>
                                <li>
                                    <a href="compare.html"><i class="icon-shuffle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- Single Item -->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
@endsection
