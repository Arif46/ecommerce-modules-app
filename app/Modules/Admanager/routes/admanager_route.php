<?php

/*------------------------------------*/
/*admanager */
Route::get('admin-admanager-index', [
    'as' => 'admin.admanager.index',
    'uses' => 'AdmanagerController@index'
]);
Route::get('admin-admanager-create', [
    'as' => 'admin.admanager.create',
    'uses' => 'AdmanagerController@create'
]);
Route::get('admin-admanager-search', [
    'as' => 'admin.admanager.search',
    'uses' => 'AdmanagerController@search'
]);
Route::post('admin-admanager-store', [
    'as' => 'admin.admanager.store',
    'uses' => 'AdmanagerController@store'
]);
Route::get('admin-admanager-show/{id}', [
    'as' => 'admin.admanager.show',
    'uses' => 'AdmanagerController@show'
]);
Route::get('admin-admanager-edit/{id}', [
    'as' => 'admin.admanager.edit',
    'uses' => 'AdmanagerController@edit'
]);
Route::patch('admin-admanager-update/{id}', [
    'as' => 'admin.admanager.update',
    'uses' => 'AdmanagerController@update'
]);
Route::get('admin-admanager-destroy/{id}', [
    'as' => 'admin.admanager.destroy',
    'uses' => 'AdmanagerController@destroy'
]);
Route::post('admin-admanager-sorting', [
    'as' => 'admin.admanager.sorting',
    'uses' => 'AdmanagerController@changeAdmanagerOrder'
]);