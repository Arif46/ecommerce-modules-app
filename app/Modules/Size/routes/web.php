<?php

use Illuminate\Support\Facades\Route;

//Route::get('size', 'SizeController@welcome');
Route::group(['module' => 'Size', 'middleware' => ['web','adminmiddleware']], function() {

    include('size_route.php');

});
