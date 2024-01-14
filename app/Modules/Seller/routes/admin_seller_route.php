<?php

Route::get('admin-all-seller-list', [
    'as' => 'admin.seller.list',
    'uses' => 'AdminSellerController@index'
]);
//Route::get('admin-wait-to-be-seller', [
//    'as' => 'admin.to-be-seller.list',
//    'uses' => 'AdminSellerController@index'
//]);

Route::get('admin-seller-search', [
    'as' => 'admin.seller.search',
    'uses' => 'AdminSellerController@search'
]);


Route::get('admin-all-seller-product-list/{id}', [
    'as' => 'admin.all.seller.product.index',
    'uses' => 'AdminSellerController@seller_product_index'
]);

Route::get('admin-all-seller-order-list/{id}', [
    'as' => 'admin.all.seller.order.index',
    'uses' => 'AdminSellerController@seller_order_index'
]);

Route::get('admin-all-seller-payment-list/{id}', [
    'as' => 'admin.all.seller.payment.index',
    'uses' => 'AdminSellerController@seller_payment_index'
]);
