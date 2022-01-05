@extends('layouts.base')
@section('t1','Home')
@section('t2','CompareList')
@section('content')
<div class="compare-area mtb-60px">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <!-- Compare Table -->
                                <div class="compare-table table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                @if(Cart::instance('compare')->count()==!0)
                                                <td class="first-column">Product</td>
                                                    @foreach (Cart::instance('compare')->content() as $k=>$comp_i)
                                                    <td class="product-image-title">
                                                        <a href="#" class="image"><img class="img-responsive" src="{{$comp_i->options->image}}" alt="Compare Product" /></a>
                                                        <a href="#" class="title">{{$comp_i->name}}</a>
                                                    </td>
                                                @endforeach

                                            </tr>
                                            <tr>
                                                <td class="first-column">Description</td>
                                                @foreach (Cart::instance('compare')->content() as $k=>$comp_i)
                                                    <td class="pro-desc">
                                                        <p>{{$comp_i->options->description}}</p>
                                                    </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Price</td>
                                                @foreach (Cart::instance('compare')->content() as $k=>$comp_i)
                                                <td class="pro-price">$ {{$comp_i->price/100}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Add to cart</td>
                                                @foreach (Cart::instance('compare')->content() as $k=>$comp_i)
                                                <td class="pro-addtocart">
                                                    <a href="{{route('addOneInCart',['id'=>$comp_i->options->id])}}" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Delete</td>
                                                @foreach (Cart::instance('compare')->content() as $k=>$comp_i)
                                                <td class="pro-remove">
                                                    <button><a href="{{route('remcomp',['id'=>$comp_i->rowId])}}"><i class="ion-trash-b"> </i></a></button>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Rating</td>
                                                <td class="pro-ratting">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </td>
                                            </tr>
                                                @endif

                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
