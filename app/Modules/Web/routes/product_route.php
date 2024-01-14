<?php

/*------------------------------------*/
Route::get('shop-details/{slug}', [
    'as' => 'product.slug',
    'uses' => 'WebProductController@index'
]);

Route::get('product/{id}', [
    'as' => 'product.id',
    'uses' => 'WebProductController@product_id'
]);

Route::post('product-review', [
    'as' => 'product.review',
    'uses' => 'WebProductController@product_review'
]);

