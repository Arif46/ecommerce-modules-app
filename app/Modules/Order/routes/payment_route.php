<?php

/*------------------------------------*/
/*Payment */

Route::any('admin-payment-index', [
    'as' => 'admin.payment.index',
    'uses' => 'PaymentController@index'
]);

Route::get('admin-payment-active/{id}', [
    'as' => 'admin.payment.active',
    'uses' => 'PaymentController@active'
]);

Route::get('admin-payment-report/{status}', [
    'as' => 'admin.payment.report',
    'uses' => 'PaymentController@payment_report'
]);

Route::get('admin-payment-inactive/{id}', [
    'as' => 'admin.payment.inactive',
    'uses' => 'PaymentController@inactive'
]);

Route::get('admin-payment-cancel/{id}', [
    'as' => 'admin.payment.cancel',
    'uses' => 'PaymentController@cancel'
]);

Route::get('admin-payment-search', [
    'as' => 'admin.payment.search',
    'uses' => 'PaymentController@search'
]);