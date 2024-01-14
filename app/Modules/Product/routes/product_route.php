<?php

/*------------------------------------*/
/*product */
Route::get('admin-product-index', [
    'as' => 'admin.product.index',
    'uses' => 'ProductController@index'
]);

Route::get('admin-pending-product-index', [
    'as' => 'admin.pending.product.index',
    'uses' => 'ProductController@pendingProducts'
]);



Route::get('admin-product-create', [
    'as' => 'admin.product.create',
    'uses' => 'ProductController@create'
]);

Route::post('admin-product-store', [
    'as' => 'admin.product.store',
    'uses' => 'ProductController@store'
]);

Route::get('admin-active-product-index', [
    'as' => 'admin.product.active',
    'uses' => 'ProductController@active_index'
]);

Route::get('admin-inactive-product-index', [
    'as' => 'admin.product.inactive',
    'uses' => 'ProductController@inactive_index'
]);

Route::get('admin-cancel-product-index', [
    'as' => 'admin.product.cancel',
    'uses' => 'ProductController@cancel_index'
]);

Route::get('admin-product-search', [
    'as' => 'admin.product.search',
    'uses' => 'ProductController@search'
]);

Route::get('admin-product-edit/{id}', [
    'as' => 'admin.product.edit',
    'uses' => 'ProductController@edit'
]);

Route::patch('admin-product-update/{id}', [
    'as' => 'admin.product.update',
    'uses' => 'ProductController@update'
]);

Route::get('admin-product-destroy/{id}', [
    'as' => 'admin.product.destroy',
    'uses' => 'ProductController@destroy'
]);

Route::get('admin-product-deletes/{id}', [
    'as' => 'admin.product.deletes',
    'uses' => 'ProductController@deletes'
]);

Route::get('admin-product-show/{id}', [
    'as' => 'admin.product.show',
    'uses' => 'ProductController@show'
]);

Route::get('admin-product-confirmation/{id}', [
    'as' => 'admin.product.confirm_product',
    'uses' => 'ProductController@confirm_product'
]);

Route::get('admin-product-featured/{id}', [
    'as' => 'admin.product.featured',
    'uses' => 'ProductController@featured_product'
]);

Route::get('admin-product-stockout/{id}', [
    'as' => 'admin.product.stockout',
    'uses' => 'ProductController@stockout'
]);