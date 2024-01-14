<?php

/*------------------------------------*/
/* Attribute Set */

Route::get('admin-attribute-set-index', [
    'as' => 'admin.attribute.set.index',
    'uses' => 'AttributesetController@index'
]);

Route::get('admin-attribute-set-create', [
    'as' => 'admin.attribute.set.create',
    'uses' => 'AttributesetController@create'
]);

Route::get('admin-attribute-set-search', [
    'as' => 'admin.attribute.set.search',
    'uses' => 'AttributesetController@search'
]);

Route::post('admin-attribute-set-store', [
    'as' => 'admin.attribute.set.store',
    'uses' => 'AttributesetController@store'
]);

Route::get('admin-attribute-set-show/{id}', [
    'as' => 'admin.attribute.set.show',
    'uses' => 'AttributesetController@show'
]);

Route::get('admin-attribute-set-edit/{id}', [
    'as' => 'admin.attribute.set.edit',
    'uses' => 'AttributesetController@edit'
]);

Route::patch('admin-attribute-set-update/{id}', [
    'as' => 'admin.attribute.set.update',
    'uses' => 'AttributesetController@update'
]);

Route::get('admin-attribute-set-destroy/{id}', [
    'as' => 'admin.attribute.set.destroy',
    'uses' => 'AttributesetController@destroy'
]);