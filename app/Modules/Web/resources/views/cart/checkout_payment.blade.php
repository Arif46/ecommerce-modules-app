@extends('Web::layouts.master')
@section('body')

	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="cart-main-area ptb-80 checkout-success">
        <div class="container text-center">                
        	@if(isset($order_head) && !empty($order_head))
                <h3>
                   Your order number is: {{ $order_head->order_number }}
                </h3>
            @endif

            <div class="row">

            	<div class="col-md-6 offset-md-3">
            		<div class="payment-area">
            			<?php

                        //dd($order_head);
            				$total_payable_amount = 0;
            				if(isset($order_head->relOrderDetail) && !empty($order_head->relOrderDetail)){
            					foreach($order_head->relOrderDetail as $value){
            						$total_price = $value->price * $value->quantity;
            						$total_shipping = $order_head->shipping_cost;

            						$total_payable_amount+=($total_price + $total_shipping) - $order_head->discount_amount;
                                   
            					}
            				}
            			?>
            			Total Payable Amount::  ৳ {{number_format($total_payable_amount,2)}}<br/><br/>

            			<!-- Payment Option:: {{App\Http\Helpers\CartHelper::payment_option()[$payment_option->payment_type]}} -->
                         <img src="{{URL::to('')}}/frontend/assets/img/payment/{{App\Http\Helpers\CartHelper::payment_option()[$payment_option->payment_type]}}.png" height="50" style="height:50px !important; " /><br/>
            			Account Number:: {{$payment_option->account_number}} <br/><br/><br/>

            			<div class="ht-shipping-content">
                            <h3>Payment</h3>
                            <p>Enter your transaction number after your payment</p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="postal-code">
                                        <input name="transaction_number" type="text" id="transaction_number" placeholder="">
                                        <input type="hidden" name="order_id" value="{{$order_head->id}}" id="order_id">
                                    </div>
                                    <div class="buttons-set">
                                        <button class="button transaction_btn" type="button"><span>Final Payment</span></button>
                                    </div>
                                </div>
                            </div>    
                        </div>

            		</div>
            	</div>

            </div>

        </div>
    </div>

    <script>
        (function (global) {

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // Making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {
        noBackPlease();

        // Disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // Stopping the event bubbling up the DOM tree...
            e.stopPropagation();
        };
    }
})(window);
    </script>

@endsection