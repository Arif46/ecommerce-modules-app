<?php

/*------------------------------------*/
/*Order */

Route::any('admin-order-index', [
    'as' => 'admin.order.index',
    'uses' => 'OrderController@order_index'
]);

Route::get('admin-order-show/{id}', [
    'as' => 'admin.order.show',
    'uses' => 'OrderController@show'
]);

Route::get('admin-order-destroy/{id}', [
    'as' => 'admin.order.destroy',
    'uses' => 'OrderController@destroy'
]);

Route::get('admin-order-search', [
    'as' => 'admin.order.search',
    'uses' => 'OrderController@search'
]);

Route::get('order-report/{status}', [
        'as' => 'admin.order.report',
        'uses' => 'OrderController@order_report'
]);