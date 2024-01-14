<?php

use Illuminate\Support\Facades\Route;
//Route::get('commission', 'CommissionController@welcome');
Route::group(['module' => 'Commission', 'middleware' => ['web','adminmiddleware']], function() {
    include('commission_route.php');
});
