@extends('Web::layouts.master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-80">
    <div class="container">
    <div class="billing-address order-summary" >
      <h4>Order Summary</h4>
    	<div class="cart-table table-responsive cart-order">
            <?php
                $total_cart_value = 0
            ?>
    		@if(count($cart_items) > 0)

    			<table class="table table-bordered">
	                <thead>
	                    <tr >	                      
	                        <th class="p-amount" style="background-color: #d7d7d7;">Unit Price</th>
	                        <th class="p-quantity" style="background-color: #d7d7d7;">Qty</th>
	                        <th class="p-total" style="background-color: #d7d7d7;">SubTotal</th>
	                        <th class="p-edit" style="background-color: #d7d7d7;">Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	
	                	@foreach($cart_items as $cart)
                            <tr>
                                <td class="">
                                    <a href="#">
                                        <img class="img img-responsive img-fluid" width="80" src="{{$cart['product_image']}}" alt="{{$cart['product_title']}}">
                                    </a>
                                </td>                               
                                <td class="p-name" colspan="3">
                                    <b>{{$cart['shop_name']}}</b><br>
                                    <a href="#">{{$cart['product_title']}}</a><br/>
                                    @if(isset($cart['product_size']) && !empty($cart['product_size']))
                                        <b>Size: </b> {{$cart['product_size']}}
                                    @endif <br/>
                                    @if(isset($cart['product_color']) && !empty($cart['product_color']))
                                        <b>Color: </b> {{$cart['product_color']}}
                                    @endif
                                </td> 
                            </tr>

	                		<tr class="cart_item_tr" product_id="{{$cart['product_id']}}">
		                                         
		                        <td class="p-amount">
		                        	৳ {{number_format($cart['sell_price'], 2)}}
		                        </td>
		                        <td class="p-quantity">
		                        	<input maxlength="12" type="number" value="{{$cart['product_quantity']}}" name="quantity" class="item-qty">
		                        </td>
		                        <td class="p-total"><span>
                                    <?php
                                        $total_cart_value+=$cart['product_quantity'] * $cart['sell_price'];
                                    ?>
		                        	৳ {{number_format(($cart['product_quantity'] * $cart['sell_price']),2)}}
		                        </span></td>
		                        <td class="edit">
		                        	<a href="#" class="remove_product_cart" product_id="{{$cart['product_id']}}" >
		                        		<img src="{{ asset('frontend/assets/img/icon/delete.png') }}" alt="">
		                        	</a>
		                        </td>
		                    </tr>

	                	@endforeach
	                    
	                </tbody>
	            </table>

    		@else
    			<p>No product is added in your cart</p>
    		@endif
            
        </div>
    </div>

        <div class="all-cart-buttons">
            
        </div>

        <div class="row">

            <div class="col-lg-5 col-md-12">
                  <div class="ht-shipping-content">
                                <h3>Discount Code</h3>
                                 <?php
                            $current_date = date('Y-m-d');
                        ?>
                        @if(!empty($coupon_code) && $current_date >= $coupon_code->valid_from && $current_date <=  $coupon_code->valid_to)
                            <div class="coupon-code-show"> 
                            <h2>{{$coupon_code->coupon_details}} <br>Discount code  <span> {{$coupon_code->coupon_code}}</span> Amount <span> ৳ {{number_format($coupon_code->amount,2)}} </span></h2>
                            </div>
                        @endif
                                <p>Enter your coupon code if you have one</p>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="postal-code">
                                            <input name="coupon_code" type="text" id="coupon_code" placeholder="">
                                        </div>
                                        <div class="buttons-set">
                                            <button class="button coupon_btn" type="button"><span>Apply Coupon</span></button>
                                        </div>
                                    </div>
                                </div>    
                            </div>              
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="ht-shipping-content">
                    <h3>Total</h3>
                    <div class="amount-totals">
                        <p class="total">Sub Total <span>৳ {{number_format($total_cart_value,2)}}</span></p>
                        
                        <p class="total">Coupon <span>

                            @if(!empty($coupon_value))
                               ৳ {{number_format($coupon_value, 2)}}
                            @else 
                                ৳ 0.00
                            @endif
                        	
                        </span></p>
                      
                        <p class="total">Grand total <span>
                            
                           ৳ {{number_format($total_cart_value - $coupon_value,2)}}
                            
                        </span></p>

                        <a href="{{route('web.cart.checkout')}}" class="button" >Procced to checkout</a> <a href="{{URL::to('')}}" class="button" style="margin-right: 20px; background-color: #4CAF50;">Continue Shopping</a>
                        
                    </div>   
                </div>
            </div>
        </div>

    </div>
</div>    


@endsection