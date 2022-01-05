@extends('layouts.base')
@section('t1','Home')
@section('t2','Checkout')
@section('content')
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="billing-info-wrap" style="text-align: center;">
                    @php
                    if(session('coupon')){
                    $total=getPrice(apply_coupon(Cart::instance('default')->subtotal(),session('coupon')));
                    }else{
                    $total=getPrice(Cart::instance('default')->subtotal());
                    }
                    @endphp
                    <h3>Payment via Paypal (<span id='payvalue'>{{$total}}</span>)</h3>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection

@section('extra-js')
<script src="https://www.paypal.com/sdk/js?client-id=AfLrBZETZUYPxW2Gd6K6KvsFj4hiEa7T2lQr7xfBaIhjdkiBTU2goBIfGMU6Si2qtD67UoaIqlHxCJWV&currency=EUR"></script>
<script>
    paypal.Buttons({



        // Sets up the transaction when a payment button is clicked

        createOrder: function(data, actions) {

            return actions.order.create({

                purchase_units: [{

                    amount: {

                        'value': parseInt('{{$total}}'), // Can reference variables or functions. Example: `value: document.getElementById('...').value`

                    }

                }]

            });

        },


        // Finalize the transaction after payer approval

        onApprove: function(data, actions) {

            return actions.order.capture().then(function(orderData) {

                // Successful capture! For dev/demo purposes:

                //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                var transaction = orderData.purchase_units[0].payments.captures[0];

                //alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');


                // When ready to go live, remove the alert and show a success message within this page. For example:
                window.location.href = '/thanks';


            });

        }

    }).render('#paypal-button-container');
</script>
@endsection
