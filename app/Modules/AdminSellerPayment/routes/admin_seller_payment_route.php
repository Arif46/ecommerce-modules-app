<?php 

/*AdminSellerPayment*/
Route::get('admin-seller-payment-index', [
    'as' => 'admin.seller.payment.index',
    'uses' => 'AdminSellerPaymentController@index'
]);

Route::get('admin-seller-payment-create', [
    'as' => 'admin.seller.payment.create',
    'uses' => 'AdminSellerPaymentController@create'
]);

Route::post('admin-seller-payment-store', [
    'as' => 'admin.seller.payment.store',
    'uses' => 'AdminSellerPaymentController@store'
]);

Route::get('admin-seller-payment-show/{id}', [
    'as' => 'admin.seller.payment.show',
    'uses' => 'AdminSellerPaymentController@show'
]);

Route::get('admin-seller-payment-edit/{id}', [
    'as' => 'admin.seller.payment.edit',
    'uses' => 'AdminSellerPaymentController@edit'
]);

Route::patch('admin-seller-payment-update/{id}', [
    'as' => 'admin.seller.payment.update',
    'uses' => 'AdminSellerPaymentController@update'
]);

Route::get('admin-seller-payment-destroy/{id}', [
    'as' => 'admin.seller.payment.destroy',
    'uses' => 'AdminSellerPaymentController@destroy'
]);

Route::get('admin-seller-payment-search', [
    'as' => 'admin.seller.payment.search',
    'uses' => 'AdminSellerPaymentController@search'
]);