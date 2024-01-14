<?php

use Illuminate\Support\Facades\Route;

//Route::get('brands', 'BrandsController@welcome');
Route::group(['module' => 'Brand', 'middleware' => ['web','adminmiddleware']], function() {

    include('brand_route.php');

});