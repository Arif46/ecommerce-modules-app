<?php
/*color*/
Route::get('admin-color-index', [
    'as' => 'admin.color.index',
    'uses' => 'ColorController@index'
]);

Route::get('admin-color-create', [
    'as' => 'admin.color.create',
    'uses' => 'ColorController@create'
]);

Route::post('admin-color-store', [
    'as' => 'admin.color.store',
    'uses' => 'ColorController@store'
]);

Route::get('admin-color-show/{id}', [
    'as' => 'admin.color.show',
    'uses' => 'ColorController@show'
]);

Route::get('admin-color-edit/{id}', [
    'as' => 'admin.color.edit',
    'uses' => 'ColorController@edit'
]);

Route::patch('admin-color-update/{id}', [
    'as' => 'admin.color.update',
    'uses' => 'ColorController@update'
]);

Route::get('admin-color-destroy/{id}', [
    'as' => 'admin.color.destroy',
    'uses' => 'ColorController@destroy'
]);

Route::get('admin-color-search', [
    'as' => 'admin.color.search',
    'uses' => 'ColorController@search'
]);