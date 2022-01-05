@extends('layouts.base')
@section('t1','Home')
@section('t2','Shop')
@section('content')
<div class="shop-category-area mt-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Shop Top Area Start -->
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area mt-35">
                    <!-- Shop Tab Content Start -->
                    <div class="tab-content jump">
                        <!-- Tab One Start -->
                        <div id="shop-1" class="tab-pane">
                            <div class="row responsive-md-class">
                            </div>
                        </div>
                        <!-- Tab One End -->
                        <!-- Tab Two Start -->
                        @if(request()->input('q'))
                        {{$products->total()}} result{{$products->total()>0 ? 's' : ''}} for your search
                        @endif
                        <div id="shop-2" class="tab-pane active">
                            @if(session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{session('success')}}
                            </div>
                            @endif
                            @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div>
                            @endif
                            @foreach ($products as $product)
                            <div class="shop-list-wrap mb-30px scroll-zoom">
                                <div class="row list-product m-0px">
                                    <div class="col-md-12 padding-0px">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                                <div class="left-img">
                                                    <div class="img-block">
                                                        <a href="{{route('p.show',['slug'=>$product->slug])}}" class="thumbnail">
                                                            <img class="first-img" src="{{ asset($product->image) }}" alt="" />
                                                        </a>
                                                        <div class="quick-view">
                                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                                <i class="ion-ios-search-strong"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                                                <div class="product-desc-wrap">
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="{{route('p.show',['slug'=>$product->slug])}}"><span>{{$product->title}}</span></a>
                                                        <h2><a href="single-product.html" class="product-link">{{$product->subtitle}}</a></h2>
                                                        <h6>Categories:
                                                            @foreach ($product->categories as $category)
                                                            <li>{{$category->name}}</li>
                                                            @endforeach
                                                        </h6>
                                                        <div class="rating-product">
                                                            {{$product->getRating()}}
                                                        </div>
                                                        <div class="product-intro-info">
                                                            <p>{{$product->subtitle}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="box-inner">
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                <li class="old-price not-cut">{{getPrice($product->price)}}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="add-to-link">
                                                            <ul>
                                                                <li class="cart"><a title="Add to cart" class="cart-btn" href="{{route('addOneInCart',['id'=>$product->id])}}">Add to cart </a></li>
                                                                <li>
                                                                    <a href="{{route('addToWishlist',['id'=>$product->id])}}" title="Add to wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route('addToCompare',['id'=>$product->id])}}" title="Add to compare"><i class="icon-shuffle"></i> Add to Compare</a>
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
                            @endforeach
                            <!-- Tab Two End -->
                        </div>
                        <!-- Shop Tab Content End -->
                        <!--  Pagination Area Start -->
                        <div class="mx-auto" style="width: 100px;">{{$products->appends(request()->input())->links()}}</div><br>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
            </div>
        </div>
    </div>
    @endsection
