<?php

/*------------------------------------*/
/*CmS */
Route::get('admin-cms-index', [
    'as' => 'admin.cms.index',
    'uses' => 'CmsController@index'
]);
Route::get('admin-cms-create', [
    'as' => 'admin.cms.create',
    'uses' => 'CmsController@create'
]);
Route::get('admin-cms-search', [
    'as' => 'admin.cms.search',
    'uses' => 'CmsController@search'
]);
Route::post('admin-cms-store', [
    'as' => 'admin.cms.store',
    'uses' => 'CmsController@store'
]);
Route::get('admin-cms-show/{id}', [
    'as' => 'admin.cms.show',
    'uses' => 'CmsController@show'
]);
Route::get('admin-cms-edit/{id}', [
    'as' => 'admin.cms.edit',
    'uses' => 'CmsController@edit'
]);
Route::patch('admin-cms-update/{id}', [
    'as' => 'admin.cms.update',
    'uses' => 'CmsController@update'
]);
Route::get('admin-cms-destroy/{id}', [
    'as' => 'admin.cms.destroy',
    'uses' => 'CmsController@destroy'
]);
Route::post('admin-cms-sorting', [
    'as' => 'admin.cms.sorting',
    'uses' => 'CmsController@changeCmsOrder'
]);

