
<?php 

/*AdminSellerPayment*/
Route::get('seller-payment-index', [
    'as' => 'seller.payment.index',
    'uses' => 'AdminSellerPaymentController@index'
]);

Route::get('seller-payment-comment', [
    'as' => 'seller.payment.comment',
    'uses' => 'AdminSellerPaymentController@create'
]);

Route::post('seller-payment-comment-store', [
    'as' => 'seller.payment.comment.store',
    'uses' => 'AdminSellerPaymentController@store'
]);

Route::get('seller-payment-show/{id}', [
    'as' => 'seller.payment.show',
    'uses' => 'AdminSellerPaymentController@show'
]);

Route::get('seller-payment-comment-edit/{id}', [
    'as' => 'seller.payment.comment.edit',
    'uses' => 'AdminSellerPaymentController@commentEdit'
]);

Route::patch('seller-payment-comment-update/{id}', [
    'as' => 'seller.payment.comment.update',
    'uses' => 'AdminSellerPaymentController@commentUpdate'
]);


Route::get('seller-payment-search', [
    'as' => 'seller.payment.search',
    'uses' => 'AdminSellerPaymentController@search'
]);