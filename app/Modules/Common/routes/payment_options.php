<?php

/*------------------------------------*/
/*faq */
Route::get('admin-payment-options-index', [
    'as' => 'admin.payment.options.index',
    'uses' => 'PaymentOptionsController@index'
]);
Route::get('admin-payment-options-create', [
    'as' => 'admin.payment.options.create',
    'uses' => 'PaymentOptionsController@create'
]);
Route::get('admin-payment-options-search', [
    'as' => 'admin.payment.options.search',
    'uses' => 'PaymentOptionsController@search'
]);
Route::post('admin-payment-options-store', [
    'as' => 'admin.payment.options.store',
    'uses' => 'PaymentOptionsController@store'
]);
Route::get('admin-payment-options-show/{id}', [
    'as' => 'admin.payment.options.show',
    'uses' => 'PaymentOptionsController@show'
]);
Route::get('admin-payment-options-edit/{id}', [
    'as' => 'admin.payment.options.edit',
    'uses' => 'PaymentOptionsController@edit'
]);
Route::patch('admin-payment-options-update/{id}', [
    'as' => 'admin.payment.options.update',
    'uses' => 'PaymentOptionsController@update'
]);
Route::get('admin-payment-options-destroy/{id}', [
    'as' => 'admin.payment.options.destroy',
    'uses' => 'PaymentOptionsController@destroy'
]);