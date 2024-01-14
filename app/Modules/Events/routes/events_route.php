<?php

/*------------------------------------*/
/*events */
Route::get('admin-events-index', [
    'as' => 'admin.events.index',
    'uses' => 'EventsController@index'
]);
Route::get('admin-events-create', [
    'as' => 'admin.events.create',
    'uses' => 'EventsController@create'
]);
Route::get('admin-events-search', [
    'as' => 'admin.events.search',
    'uses' => 'EventsController@search'
]);
Route::post('admin-events-store', [
    'as' => 'admin.events.store',
    'uses' => 'EventsController@store'
]);
Route::get('admin-events-show/{id}', [
    'as' => 'admin.events.show',
    'uses' => 'EventsController@show'
]);
Route::get('admin-events-edit/{id}', [
    'as' => 'admin.events.edit',
    'uses' => 'EventsController@edit'
]);
Route::patch('admin-events-update/{id}', [
    'as' => 'admin.events.update',
    'uses' => 'EventsController@update'
]);
Route::get('admin-events-destroy/{id}', [
    'as' => 'admin.events.destroy',
    'uses' => 'EventsController@destroy'
]);