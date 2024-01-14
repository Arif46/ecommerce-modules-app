<?php 
    if(Session::has('cart')){ 
        $cart_item_count = count(Session::get('cart'));
        $cart_total = Session::get('cart_total'); 
        $cart_items = Session::get('cart');  
?>
    
    <div class="cart-item-a-wrapper pt-10">
        <div class="cart-item-amount">
            <!-- <span class="cart-number"><span>{{$cart_item_count}}</span> items</span> -->
            <div class="cart-amount">
                <h3 style="font-size: 18px;">Cart Subtotal - ৳ {{number_format($cart_total['total'], 2)}}</h3>
             
            </div>
        </div>   
    </div>

    @if(count($cart_items) > 0)
        @foreach($cart_items as $cart)
            <div class="cart-dropdown-item" style="border-bottom: 1px solid #d7d7d7;">
                <div class="cart-p-image">
                    <a href="#"><img width="60" src="{{$cart['product_image']}}" alt=""></a>
                </div>
                <div class="cart-p-text">
                    <a href="#" class="cart-p-name">{{$cart['product_title']}}</a>                    
                    <div class="cart-p-qty">
                        <span style="padding-right: 20px; font-size: 14px; font-weight: bold;">৳ {{number_format($cart['product_quantity'] * $cart['sell_price'], 2)}}</span>
                        <label style="height: 20px;">Qty</label>
                        <input style="height: 20px;" class="update-product-mc" product_id="{{$cart['product_id']}}" type="number" placeholder="{{$cart['product_quantity']}}" value="{{$cart['product_quantity']}}">
                        <button style="height: 20px;" class="remove-product-mc" product_id="{{$cart['product_id']}}"><i class="icon icon-Delete"></i></button>
                    </div>
                </div>
            </div>


        @endforeach
    @endif    
    
<?php
    }
?>  


<div class="all-cart-buttons text-center pt-30">
        <a href="{{route('web.cart.checkout')}}" class="grey-button button">Checkout</a> 
        <a href="{{route('web.my.cart')}}" class="button"><span>My Cart</span></a>
</div>
