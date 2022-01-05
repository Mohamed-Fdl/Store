@extends('layouts.base')
@section('t1','Dashboard')
@section('content')
<br>
<h3>Payments history</h3>
<br>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <br>
        @foreach ($pays as $pay)
        Payments for the : {{Carbon\Carbon::parse($pay->created_at)->format('M d Y');}}
        <table class="table">
            <h3 style="text-align: center;"></h3> <br>
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            @php
            $payments=json_decode($pay->shipping)
            @endphp
            <tbody>
                @foreach ($payments as $id=>$qty)
                <tr>
                    <td>{{App\Models\Product::find($id)->title}}</td>
                    <td>{{$qty}}</td>
                    <td>{{getPrice($qty * App\Models\Product::find($id)->price)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach

    </div>
</div>
<br>
@endsection
