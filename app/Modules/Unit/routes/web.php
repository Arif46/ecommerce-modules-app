<?php

use Illuminate\Support\Facades\Route;

//Route::get('unit', 'UnitController@welcome');
Route::group(['module' => 'Unit', 'middleware' => ['web','adminmiddleware']], function() {

    include('unit_route.php');

});
