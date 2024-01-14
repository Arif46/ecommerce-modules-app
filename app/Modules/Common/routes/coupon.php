<?php

/*------------------------------------*/
/*coupon */
Route::get('admin-coupon-index', [
    'as' => 'admin.coupon.index',
    'uses' => 'CouponController@index'
]);
Route::get('admin-coupon-create', [
    'as' => 'admin.coupon.create',
    'uses' => 'CouponController@create'
]);
Route::get('admin-coupon-search', [
    'as' => 'admin.coupon.search',
    'uses' => 'CouponController@search'
]);
Route::post('admin-coupon-store', [
    'as' => 'admin.coupon.store',
    'uses' => 'CouponController@store'
]);
Route::get('admin-coupon-show/{id}', [
    'as' => 'admin.coupon.show',
    'uses' => 'CouponController@show'
]);
Route::get('admin-coupon-edit/{id}', [
    'as' => 'admin.coupon.edit',
    'uses' => 'CouponController@edit'
]);
Route::patch('admin-coupon-update/{id}', [
    'as' => 'admin.coupon.update',
    'uses' => 'CouponController@update'
]);
Route::get('admin-coupon-destroy/{id}', [
    'as' => 'admin.coupon.destroy',
    'uses' => 'CouponController@destroy'
]);