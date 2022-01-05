@extends('layouts.base')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('t1','Home')
@section('t2','Cart')
@section('content')
<div class="cart-main-area mtb-60px">
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
                    <h3 class="cart-page-title">Your cart items</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- <form action="" method="post"> -->
                                @csrf
                                <div class="table-content table-responsive cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Until Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $k=>$procart)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a  href="#"><img class="img-responsive" src="/{{$procart->options->image}}" alt="" /></a>
                                                    </td>
                                                    <td class="product-name"><a href="#">{{$procart->name}}</a></td>
                                                    <td class="product-price-cart"><span class="amount">{{getPrice($procart->price)}}</span></td>
                                                    <td class="product-quantity">
                                                            <!-- <input type="hidden" name="id[{{$k}}]" value="{{$procart->rowId}}"> -->
                                                            <!-- <input class="cart-plus-minus-box" type="text" name="qty[{{$k}}]" value="1" /> -->
                                                            <select name="qty" class="custom-select"  id="qty" data-id={{$procart->rowId}}>
                                                                @for ($i=1;$i <= 10 ;$i++)
                                                                    <option value="{{$i}}"  {{ $i==$procart->qty ? 'selected' : '' }}>{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                    </td>
                                                    <td class="product-subtotal">{{getPrice($procart->qty*$procart->price)}}</td>
                                                    <td class="product-remove">
                                                        <a href="{{route('remove',['id'=>$procart->rowId])}}"><i class="icon-close"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update">
                                                <a href="{{route('checkout')}}">Continue Shopping</a>
                                            </div>
                                            <div class="cart-clear">
                                                <a href="/removecart">Clear Shopping Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @if(session('successcoupon'))
                            <div class="alert alert-primary" role="alert">
                                {{session('successcoupon')}}
                            </div>
                            @endif
                            @if(session('errorcoupon'))
                            <div class="alert alert-danger" role="alert">
                                {{session('errorcoupon')}}
                            </div>
                            @endif
                            @if(session('cancel'))
                            <div class="alert alert-warning" role="alert">
                                {{session('cancel')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-lm-30px">
                                    <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                        </div>
                                        <div class="discount-code">
                                            <p>Enter fadel2021 code coupon to have 50% of reduction.</p>
                                            <form action="{{route('addCoupon')}}" method="post">
                                                @csrf
                                                <input type="text" name="code" required="" />
                                                <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                            </form>
                                            <br>
                                            @if(session('coupon'))
                                            <a href="{{route('cancelCoupon')}}"><button type="button" class="btn btn-danger">Cancel coupon</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-md-30px">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                        <h5>Total products <span>{{getPrice(Cart::instance('default')->subtotal())}}</span></h5>
                                        @if(session('coupon'))
                                        <h5>Applied coupon <span>{{session('coupon')}}%</span></h5>
                                        @endif
                                        <div class="total-shipping">
                                        </div>
                                        <h4 class="grand-totall-title">Grand Total <span>
                                            @if (session('coupon'))
                                                {{getPrice(apply_coupon(Cart::instance('default')->subtotal(),session('coupon')))}}
                                            @else
                                                {{getPrice(Cart::instance('default')->subtotal())}}
                                            @endif
                                        </span></h4>
                                        <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@section('extra-js')
<script>
        let selects=document.querySelectorAll('#qty')
        Array.from(selects).forEach((element) => {
            element.addEventListener('change', function(){
                var rowId= this.getAttribute('data-id')
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                fetch(
                    `/updateCart/${rowId}`,
                    {
                        headers:{
                            "Content-Type" : "application/json",
                            "Accept" : "application/json ,text/plain, */*",
                            "X-Requestedt-With" : "XMLHttpRequest",
                            "X-CSRF-TOKEN" : token
                        },
                        method: 'post',
                        body : JSON.stringify({
                            qty: this.value
                        })
                    }
                ).then((data) =>{
                    console.log(data)
                    location.reload()
                }).catch((error) =>{
                    console.log(error)
                })

            })
        })
    </script>
@endsection
@endsection
