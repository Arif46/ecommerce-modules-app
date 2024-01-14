<?php

/*------------------------------------*/
/*Category */
Route::get('admin-category-index', [
    'as' => 'admin.category.index',
    'uses' => 'CategoryController@index'
]);

Route::get('admin-category-create', [
    'as' => 'admin.category.create',
    'uses' => 'CategoryController@create'
]);

Route::get('admin-category-search', [
    'as' => 'admin.category.search',
    'uses' => 'CategoryController@search'
]);

Route::post('admin-category-store', [
    'as' => 'admin.category.store',
    'uses' => 'CategoryController@store'
]);
Route::get('admin-category-show/{id}', [
    'as' => 'admin.category.show',
    'uses' => 'CategoryController@show'
]);
Route::get('admin-category-edit/{id}', [
    'as' => 'admin.category.edit',
    'uses' => 'CategoryController@edit'
]);

Route::get('admin-sub-category/{id}', [
    'as' => 'admin.sub.category',
    'uses' => 'CategoryController@sub_category'
]);

Route::patch('admin-category-update/{id}', [
    'as' => 'admin.category.update',
    'uses' => 'CategoryController@update'
]);

Route::get('admin-category-destroy/{id}', [
    'as' => 'admin.category.destroy',
    'uses' => 'CategoryController@destroy'
]);