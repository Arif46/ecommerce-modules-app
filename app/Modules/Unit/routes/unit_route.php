<?php
/*unit*/
Route::get('admin-unit-index', [
    'as' => 'admin.unit.index',
    'uses' => 'UnitController@index'
]);

Route::get('admin-unit-create', [
    'as' => 'admin.unit.create',
    'uses' => 'UnitController@create'
]);

Route::post('admin-unit-store', [
    'as' => 'admin.unit.store',
    'uses' => 'UnitController@store'
]);

Route::get('admin-unit-show/{id}', [
    'as' => 'admin.unit.show',
    'uses' => 'UnitController@show'
]);

Route::get('admin-unit-edit/{id}', [
    'as' => 'admin.unit.edit',
    'uses' => 'UnitController@edit'
]);

Route::patch('admin-unit-update/{id}', [
    'as' => 'admin.unit.update',
    'uses' => 'UnitController@update'
]);

Route::get('admin-unit-destroy/{id}', [
    'as' => 'admin.unit.destroy',
    'uses' => 'UnitController@destroy'
]);

Route::get('admin-unit-search', [
    'as' => 'admin.unit.search',
    'uses' => 'UnitController@search'
]);