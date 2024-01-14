<?php
/*commission*/
Route::get('admin-commission-index', [
    'as' => 'admin.commission.index',
    'uses' => 'CommissionController@index'
]);

Route::get('admin-commission-create', [
    'as' => 'admin.commission.create',
    'uses' => 'CommissionController@create'
]);
Route::post('admin-commission-store', [
    'as' => 'admin.commission.store',
    'uses' => 'CommissionController@store'
]);
Route::get('admin-commission-show/{id}', [
    'as' => 'admin.commission.show',
    'uses' => 'CommissionController@show'
]);

Route::get('admin-commission-edit/{id}', [
    'as' => 'admin.commission.edit',
    'uses' => 'CommissionController@edit'
]);
Route::patch('admin-commission-update/{id}', [
    'as' => 'admin.commission.update',
    'uses' => 'CommissionController@update'
]);

Route::get('admin-commission-search', [
    'as' => 'admin.commission.search',
    'uses' => 'CommissionController@search'
]);
