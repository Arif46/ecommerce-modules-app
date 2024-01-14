<?php

/*------------------------------------*/
/*slider */
Route::get('admin-slider-index', [
    'as' => 'admin.slider.index',
    'uses' => 'SliderController@index'
]);
Route::get('admin-slider-create', [
    'as' => 'admin.slider.create',
    'uses' => 'SliderController@create'
]);
Route::get('admin-slider-search', [
    'as' => 'admin.slider.search',
    'uses' => 'SliderController@search'
]);
Route::post('admin-slider-store', [
    'as' => 'admin.slider.store',
    'uses' => 'SliderController@store'
]);
Route::get('admin-slider-show/{id}', [
    'as' => 'admin.slider.show',
    'uses' => 'SliderController@show'
]);
Route::get('admin-slider-edit/{id}', [
    'as' => 'admin.slider.edit',
    'uses' => 'SliderController@edit'
]);
Route::patch('admin-slider-update/{id}', [
    'as' => 'admin.slider.update',
    'uses' => 'SliderController@update'
]);
Route::get('admin-slider-destroy/{id}', [
    'as' => 'admin.slider.destroy',
    'uses' => 'SliderController@destroy'
]);
Route::post('admin-slider-sorting', [
    'as' => 'admin.slider.sorting',
    'uses' => 'SliderController@changeSliderOrder'
]);