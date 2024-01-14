<?php

use App\Modules\Web\Http\Controllers\CartController;

Route::post('web-cart-add', [
    'as' => 'web.cart.add',
    'uses' => 'CartController@add_items'
]);

Route::get('cart', [
    'as' => 'web.my.cart',
    'uses' => 'CartController@cart'
]);

Route::get('paypal-status', [
    'as' => 'paypal-status',
    'uses' => 'CartController@getPaymentStatus'
]);

Route::get('payWithpaypal', [
    'as' => 'payWithpaypal',
    'uses' => 'CartController@payWithpaypal'
]);

Route::post('delete-cart-mc', [
    'as' => 'web.cart.remove.item.mc',
    'uses' => 'CartController@remove_item_mc'
]);

Route::post('update-cart-mc', [
        'as' => 'web.cart.update.mc',
        'uses' => 'CartController@cart_update_mc'
    ]);

Route::post('cart-update', [
    'as' => 'web.cart.update',
    'uses' => 'CartController@cart_update'
]);

Route::post('cart--shipping-update', [
    'as' => 'web.cart.shipping.update',
    'uses' => 'CartController@cart_shipping_update'
]);

Route::post('cart-coupon', [
    'as' => 'web.cart.coupon',
    'uses' => 'CartController@cart_coupon'
]);

Route::post('payment-transaction', [
    'as' => 'web.cart.payment.transaction',
    'uses' => 'CartController@payment_transaction'
]);

Route::post('cart-delete', [
    'as' => 'web.cart.remove.item',
    'uses' => 'CartController@remove_item'
]);

//Route::get('checkout', [
//    'as' => 'web.cart.checkout',
//    'uses' => 'CartController@checkout'
//]);
Route::get('checkout', [CartController::class, 'checkout'])->name('web.cart.checkout');

//Route::any('confirm-checkout', [
//    'as' => 'web.cart.confirm.checkout',
//    'uses' => [CartController::class,'confirm_checkout']
//]);
Route::any('confirm-checkout', [CartController::class, 'confirm_checkout'])->name('web.cart.confirm.checkout');


Route::any('confirm-customer-checkout', [
    'as' => 'web.cart.confirm.customer.checkout',
    'uses' => 'CartController@confirm_customer_checkout'
]);

Route::any('checkout-success/{order_number}', [
    'as' => 'web.cart.checkout.success',
    'uses' => 'CartController@checkout_success'
]);

Route::any('checkout-customer-success/{order_number}', [
    'as' => 'web.cart.customer.checkout.success',
    'uses' => 'CartController@checkout_customer_success'
]);

Route::any('checkout-paypal-success/{order_number}', [
    'as' => 'web.cart.paypal.checkout.success',
    'uses' => 'CartController@checkout_paypal_success'
]);

Route::any('checkout-payment/{order_number}', [
    'as' => 'web.cart.checkout.payment',
    'uses' => 'CartController@checkout_payment'
]);

Route::any('customer-pay-again/{order_number}', [
    'as' => 'web.customer.pay.again',
    'uses' => 'CartController@pay_again'
]);

Route::get('checkout-billing-shipping-address-edit/{id}', [
    'as' => 'checkout.edit.shipping.billing.address',
    'uses' => 'CartController@edit_billing_address'
]);

Route::patch('checkout-update-billing-shipping-info/{id}', [
    'as' => 'checkout.update.billing.shipping.info',
    'uses' => 'CartController@update_billing_shipping_address'
]);

Route::get('checkout-delete-shipping-billing-address/{id}', [
    'as' => 'checkout.delete.shipping.billing.address',
    'uses' => 'CartController@destroy_billing_shipping'
]);