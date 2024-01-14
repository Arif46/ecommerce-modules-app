<?php

Route::get('seller/coupon', [
    'as' => 'seller.coupon',
    'uses' => 'WebSellerCouponController@index'
]);

Route::get('seller/coupon-create', [
    'as' => 'seller.coupon.create',
    'uses' => 'WebSellerCouponController@create'
]);

Route::post('seller/coupon-store', [
    'as' => 'seller.coupon.store',
    'uses' => 'WebSellerCouponController@store'
]);

Route::get('seller-coupon-edit/{id}', [
    'as' => 'seller.coupon.edit',
    'uses' => 'WebSellerCouponController@edit'
]); 

Route::patch('seller-coupon-update/{id}', [
    'as' => 'seller.coupon.update',
    'uses' => 'WebSellerCouponController@update'
]);