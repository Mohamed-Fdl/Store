@extends('layouts.base')
@section('t1','Home')
@section('t2','Wishlist')
@section('content')
    <!-- Breadcrumb Area End-->
            <!-- Wishlist area start -->
            <div class="cart-main-area mtb-60px">
                <div class="container">
                    <h3 class="cart-page-title">Your wishlist items</h3>
                    @if(session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Until Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Add To Cart</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::instance('wishlist')->content() as $k=>$wishlist_i)
                                            <form action="{{route('addCart',['id'=>$wishlist_i->options->id])}}" method="post">
                                                @csrf
                                                <tr>
                                                        <td class="product-thumbnail">
                                                            <a  href="#"><img class="img-responsive" src="/{{$wishlist_i->options->image}}" alt="" /></a>
                                                        </td>
                                                        <td class="product-name"><a href="#">{{$wishlist_i->name}}</a></td>
                                                        <td class="product-price-cart"><span class="amount">$ {{$wishlist_i->price/100}}</span></td>
                                                        <td class="product-quantity">
                                                                <div class="cart-plus-minus">
                                                                    <input type="hidden" name="index" value="{{$k}}">
                                                                    <input class="cart-plus-minus-box" type="text" name="qty[{{$k}}]" value="1" />
                                                                </div>
                                                            </td>
                                                            <td class="product-subtotal">$ {{($wishlist_i->qty * $wishlist_i->price)/100}}</td>
                                                            <td class="product-wishlist-cart">
                                                                <a href=""><input type="submit" value="add to cart"> </a>
                                                            </td>
                                                </tr>
                                            </form>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
