<?php

/*------------------------------------*/
/*attribute */
Route::get('admin-attribute-index', [
    'as' => 'admin.attribute.index',
    'uses' => 'AttributeController@index'
]);

Route::get('admin-attribute-create', [
    'as' => 'admin.attribute.create',
    'uses' => 'AttributeController@create'
]);

Route::get('admin-attribute-search', [
    'as' => 'admin.attribute.search',
    'uses' => 'AttributeController@search'
]);

Route::post('admin-attribute-store', [
    'as' => 'admin.attribute.store',
    'uses' => 'AttributeController@store'
]);

Route::post('admin-attribute-option-store', [
    'as' => 'admin.attribute.option.store',
    'uses' => 'AttributeController@store_option'
]);

Route::get('admin-attribute-show/{id}', [
    'as' => 'admin.attribute.show',
    'uses' => 'AttributeController@show'
]);

Route::get('admin-attribute-edit/{id}', [
    'as' => 'admin.attribute.edit',
    'uses' => 'AttributeController@edit'
]);

Route::get('admin-attribute-option-edit/{id}', [
    'as' => 'admin.attribute.option.edit',
    'uses' => 'AttributeController@edit_option'
]);

Route::get('admin-attribute-option/{id}', [
    'as' => 'admin.attribute.option',
    'uses' => 'AttributeController@attr_option'
]);

Route::patch('admin-attribute-update/{id}', [
    'as' => 'admin.attribute.update',
    'uses' => 'AttributeController@update'
]);

Route::patch('admin-attribute-option-update/{id}', [
    'as' => 'admin.attribute.option.update',
    'uses' => 'AttributeController@update_option'
]);

Route::get('admin-attribute-destroy/{id}', [
    'as' => 'admin.attribute.destroy',
    'uses' => 'AttributeController@destroy'
]);

Route::get('admin-attribute-option-destroy/{id}', [
    'as' => 'admin.attribute.option.destroy',
    'uses' => 'AttributeController@destroy_option'
]);