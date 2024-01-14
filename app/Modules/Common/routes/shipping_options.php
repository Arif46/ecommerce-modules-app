<?php

/*------------------------------------*/
/*faq */
Route::get('admin-shipping-options-index', [
    'as' => 'admin.shipping.options.index',
    'uses' => 'ShippingOptionsController@index'
]);
Route::get('admin-shipping-options-create', [
    'as' => 'admin.shipping.options.create',
    'uses' => 'ShippingOptionsController@create'
]);
Route::get('admin-shipping-options-search', [
    'as' => 'admin.shipping.options.search',
    'uses' => 'ShippingOptionsController@search'
]);
Route::post('admin-shipping-options-store', [
    'as' => 'admin.shipping.options.store',
    'uses' => 'ShippingOptionsController@store'
]);
Route::get('admin-shipping-options-show/{id}', [
    'as' => 'admin.shipping.options.show',
    'uses' => 'ShippingOptionsController@show'
]);
Route::get('admin-shipping-options-edit/{id}', [
    'as' => 'admin.shipping.options.edit',
    'uses' => 'ShippingOptionsController@edit'
]);
Route::patch('admin-shipping-options-update/{id}', [
    'as' => 'admin.shipping.options.update',
    'uses' => 'ShippingOptionsController@update'
]);
Route::get('admin-shipping-options-destroy/{id}', [
    'as' => 'admin.shipping.options.destroy',
    'uses' => 'ShippingOptionsController@destroy'
]);