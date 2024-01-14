<?php
/*------------------------------------*/
/*customer_route */
Route::get('admin-customer-index', [
    'as' => 'admin.customer.index',
    'uses' => 'CustomerController@index'
]);

Route::get('admin-customer-search', [
    'as' => 'admin.customer.search',
    'uses' => 'CustomerController@search'
]);

Route::get('admin-customer-create', [
    'as' => 'admin.customer.create',
    'uses' => 'CustomerController@create'
]);

Route::post('admin-customer-store', [
    'as' => 'admin.customer.store',
    'uses' => 'CustomerController@store'
]);


Route::get('admin-customer-show/{id}', [
    'as' => 'admin.customer.show',
    'uses' => 'CustomerController@show'
]);


Route::get('admin-customer-edit/{id}', [
    'as' => 'admin.customer.edit',
    'uses' => 'CustomerController@edit'
]);

Route::patch('admin-customer-update/{id}', [
    'as' => 'admin.customer.update',
    'uses' => 'CustomerController@update'
]);

Route::get('admin-customer-destroy/{id}', [
    'as' => 'admin.customer.destroy',
    'uses' => 'CustomerController@destroy'
]);

Route::get('admin-customer-deletes/{id}', [
    'as' => 'admin.customer.deletes',
    'uses' => 'CustomerController@deletes'
]);