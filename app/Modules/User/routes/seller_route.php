<?php
/*------------------------------------*/
/*seller_route */
Route::get('admin-seller-index', [
    'as' => 'admin.seller.index',
    'uses' => 'SellerController@index'
]);

Route::get('admin-seller-search', [
    'as' => 'admin.seller.search',
    'uses' => 'SellerController@search'
]);

Route::get('admin-seller-create', [
    'as' => 'admin.seller.create',
    'uses' => 'SellerController@create'
]);

Route::post('admin-seller-store', [
    'as' => 'admin.seller.store',
    'uses' => 'SellerController@store'
]);

Route::get('admin-seller-show/{id}', [
    'as' => 'admin.seller.show',
    'uses' => 'SellerController@show'
]);


Route::get('admin-seller-edit/{id}', [
    'as' => 'admin.seller.edit',
    'uses' => 'SellerController@edit'
]);

Route::patch('admin-seller-update/{id}', [
    'as' => 'admin.seller.update',
    'uses' => 'SellerController@update'
]);

Route::get('admin-seller-destroy/{id}', [
    'as' => 'admin.seller.destroy',
    'uses' => 'SellerController@destroy'
]);

Route::get('admin-seller-deletes/{id}', [
    'as' => 'admin.seller.deletes',
    'uses' => 'SellerController@deletes'
]);