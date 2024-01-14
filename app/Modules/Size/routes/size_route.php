<?php
/*size*/
Route::get('admin-size-index', [
    'as' => 'admin.size.index',
    'uses' => 'SizeController@index'
]);

Route::get('admin-size-create', [
    'as' => 'admin.size.create',
    'uses' => 'SizeController@create'
]);

Route::post('admin-size-store', [
    'as' => 'admin.size.store',
    'uses' => 'SizeController@store'
]);

Route::get('admin-size-show/{id}', [
    'as' => 'admin.size.show',
    'uses' => 'SizeController@show'
]);

Route::get('admin-size-edit/{id}', [
    'as' => 'admin.size.edit',
    'uses' => 'SizeController@edit'
]);

Route::patch('admin-size-update/{id}', [
    'as' => 'admin.size.update',
    'uses' => 'SizeController@update'
]);

Route::get('admin-size-destroy/{id}', [
    'as' => 'admin.size.destroy',
    'uses' => 'SizeController@destroy'
]);

Route::get('admin-size-search', [
    'as' => 'admin.size.search',
    'uses' => 'SizeController@search'
]);