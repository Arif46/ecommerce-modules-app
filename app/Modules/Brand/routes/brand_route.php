<?php
/*brand*/
Route::get('admin-brand-index', [
    'as' => 'admin.brand.index',
    'uses' => 'BrandController@index'
]);

Route::get('admin-brand-create', [
    'as' => 'admin.brand.create',
    'uses' => 'BrandController@create'
]);

Route::post('admin-brand-store', [
    'as' => 'admin.brand.store',
    'uses' => 'BrandController@store'
]);

Route::get('admin-brand-show/{id}', [
    'as' => 'admin.brand.show',
    'uses' => 'BrandController@show'
]);

Route::get('admin-brand-edit/{id}', [
    'as' => 'admin.brand.edit',
    'uses' => 'BrandController@edit'
]);

Route::patch('admin-brand-update/{id}', [
    'as' => 'admin.brand.update',
    'uses' => 'BrandController@update'
]);

Route::get('admin-brand-destroy/{id}', [
    'as' => 'admin.brand.destroy',
    'uses' => 'BrandController@destroy'
]);

Route::get('admin-brand-search', [
    'as' => 'admin.brand.search',
    'uses' => 'BrandController@search'
]);