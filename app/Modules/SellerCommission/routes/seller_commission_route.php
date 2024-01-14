<?php
/*commission*/
Route::get('admin-seller-commission-index', [
    'as' => 'admin.seller.commission.index',
    'uses' => 'SellerCommissionController@index'
]);

Route::get('admin-seller-commission-create', [
    'as' => 'admin.seller.commission.create',
    'uses' => 'SellerCommissionController@create'
]);
Route::post('admin-seller-commission-store', [
    'as' => 'admin.seller.commission.store',
    'uses' => 'SellerCommissionController@store'
]);
Route::get('admin-seller-commission-show/{id}', [
    'as' => 'admin.seller.commission.show',
    'uses' => 'SellerCommissionController@show'
]);

Route::get('admin-seller-commission-edit/{id}', [
    'as' => 'admin.seller.commission.edit',
    'uses' => 'SellerCommissionController@edit'
]);
Route::patch('admin-seller-commission-update/{id}', [
    'as' => 'admin.seller.commission.update',
    'uses' => 'SellerCommissionController@update'
]);

Route::get('admin-seller-commission-search', [
    'as' => 'admin.seller.commission.search',
    'uses' => 'SellerCommissionController@search'
]);
