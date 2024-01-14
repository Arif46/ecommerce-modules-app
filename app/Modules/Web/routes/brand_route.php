<?php
Route::get('shop/brand/{id}', [
    'as' => 'brand.id',
    'uses' => 'WebBrandController@index'
]);