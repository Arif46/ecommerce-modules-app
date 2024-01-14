<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Route;


class CartHelper
{

    public static function payment_option(){
        $payment = [
            'cash-on-delevery' => 'cod',
            'paypal' => 'paypal',
            'card-payment' => 'card-payment',
            'bank-transfer' => 'bank-transfer',
            'bkash' => 'bkash',
            'nagad' => 'nagad',
            'rocket' => 'rocket'            
        ];

        return $payment;
    }

    public static function shipping_method(){
        $shipping['free'] = [
            'type' => 'Free',
            'short_desc' => 'Free shipping avobe $50',
            'price' => '0.00'
        ];
        $shipping['basic'] = [
            'type' => 'Basic',
            'short_desc' => 'Estimated time 3-6 business days',
            'price' => '7.00'
        ];
        $shipping['second-day'] = [
            'type' => 'Second',
            'short_desc' => 'Estimated time 2 business days',
            'price' => '20.00'
        ];
        $shipping['overnight'] = [
            'type' => 'Overnight',
            'short_desc' => 'Estimated arrival on or before same day',
            'price' => '30.00'
        ];
        return $shipping;
    }

	public static function add_item($data)
    {
        // Check session exists or not
        if(Session::has('cart')){
            $cart_items = Session::get('cart');
        }else{
            $cart_items = [];
        }

        // Product id checking
        if(isset($cart_items[$data['product_id']])){
            $cart_items[$data['product_id']]['product_quantity'] += $data['product_quantity'];
        }else{
            $cart_items[$data['product_id']] = $data;
        }

        $new_items = CartHelper::calculate_cart($cart_items);

        return $new_items;

    }


	protected static function calculate_cart($cart_items){
	    $cart_total = [];

	    $new_items = [];
	    $cart_total['total'] = 0;
	    if(count($cart_items) > 0){
	        foreach ($cart_items as $item){

	            $item['product_quantity'] = $item['product_quantity'];
	            $item['subtotal'] = round($item['sell_price']*$item['product_quantity'],2);
	            $cart_total['total'] += $item['subtotal'];
	            $new_items[$item['product_id']] = $item;
	            
	        }
	    }

	    Session::put('cart',$new_items);
	    Session::put('cart_total',$cart_total);

	    return $new_items;
	}

	public static function update($items)
    {

        if(Session::has('cart')){
            $cart_items = Session::get('cart');
        }else{
            $cart_items = [];
        }

        foreach ($items as $new_item){
            $product_id = $new_item['product_id'];
            if(isset($cart_items[$product_id])){
                if($new_item['product_quantity'] > 0)
                {
                    $cart_items[$product_id]['product_quantity'] = $new_item['product_quantity'];
                }else{
                    /*Quantiy value 0 or negative*/
                    $cart_items[$product_id]['product_quantity'] = 1;
                }

            }
        }

        $new_items = CartHelper::calculate_cart($cart_items);


        return $new_items;

    }

    public static function coupon_code_update($coupon_code){

    	if(Session::has('cart')){
            $cart_items = Session::get('cart');
        }else{
            $cart_items = [];
        }

        foreach($cart_items as $key=>$items){
        	$product_id = $key;
        	if(!empty($items['available_coupon'])){
        		foreach($items['available_coupon'] as $coupon){
        			if($coupon->coupon_code == $coupon_code){
        				$cart_items[$product_id]['coupon_code'] = $coupon->coupon_code;
        				$cart_items[$product_id]['coupon_value'] = $coupon->amount;
        			}
        		}
        	}
        }


        $new_items = CartHelper::calculate_cart($cart_items);


        return $new_items;

    }

    public static function shipping_update($items)
    {

        if(Session::has('cart')){
            $cart_items = Session::get('cart');
        }else{
            $cart_items = [];
        }

        foreach ($items as $new_item){
            $product_id = $new_item['product_id'];
            $shipping_key = $new_item['shipping_key'];
            if(isset($cart_items[$product_id]['available_shipping'][$shipping_key])){
                $cart_items[$product_id]['shipping'] = $cart_items[$product_id]['available_shipping'][$shipping_key]->shipping_value;
                $cart_items[$product_id]['shipping_service'] = $cart_items[$product_id]['available_shipping'][$shipping_key]->courier_service;
            }
        }

// echo '<pre>';
// print_r($cart_items);exit();
        $new_items = CartHelper::calculate_cart($cart_items);


        return $new_items;

    }

    public static function remove_item($product_id)
	{

	    if(Session::has('cart')){
	        $cart_items = Session::get('cart');
	    }else{
	        $cart_items = [];
	    }

	    if(isset($cart_items[$product_id])){
	        unset($cart_items[$product_id]);
	    }

	    $new_items = CartHelper::calculate_cart($cart_items,true);

	    return $new_items;

	}
}