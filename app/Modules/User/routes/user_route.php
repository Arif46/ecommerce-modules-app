<?php
/*------------------------------------*/
/*user */
Route::get('admin-user-index', [
    'as' => 'admin.user.index',
    'uses' => 'UserController@index'
]);

Route::get('admin-user-create', [
    'as' => 'admin.user.create',
    'uses' => 'UserController@create'
]);
Route::get('admin-user-search', [
    'as' => 'admin.user.search',
    'uses' => 'UserController@search'
]);

Route::post('admin-user-store', [
    'as' => 'admin.user.store',
    'uses' => 'UserController@store'
]);

Route::get('admin-user-show/{id}', [
    'as' => 'admin.user.show',
    'uses' => 'UserController@show'
]);
Route::get('admin-user-edit/{id}', [
    'as' => 'admin.user.edit',
    'uses' => 'UserController@edit'
]);

Route::patch('admin-user-update/{id}', [
    'as' => 'admin.user.update',
    'uses' => 'UserController@update'
]);

Route::get('admin-user-destroy/{id}', [
    'as' => 'admin.user.destroy',
    'uses' => 'UserController@destroy'
]);