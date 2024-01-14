<?php

/*------------------------------------*/
/*faq */
Route::get('admin-faq-index', [
    'as' => 'admin.faq.index',
    'uses' => 'FaqController@index'
]);
Route::get('admin-faq-create', [
    'as' => 'admin.faq.create',
    'uses' => 'FaqController@create'
]);
Route::get('admin-faq-search', [
    'as' => 'admin.faq.search',
    'uses' => 'FaqController@search'
]);
Route::post('admin-faq-store', [
    'as' => 'admin.faq.store',
    'uses' => 'FaqController@store'
]);
Route::get('admin-faq-show/{id}', [
    'as' => 'admin.faq.show',
    'uses' => 'FaqController@show'
]);
Route::get('admin-faq-edit/{id}', [
    'as' => 'admin.faq.edit',
    'uses' => 'FaqController@edit'
]);
Route::patch('admin-faq-update/{id}', [
    'as' => 'admin.faq.update',
    'uses' => 'FaqController@update'
]);
Route::get('admin-faq-destroy/{id}', [
    'as' => 'admin.faq.destroy',
    'uses' => 'FaqController@destroy'
]);
Route::post('admin-faq-sorting', [
    'as' => 'admin.faq.sorting',
    'uses' => 'FaqController@changeFaqOrder'
]);