<?php

use Illuminate\Support\Facades\Route;

Route::get('seller-control', 'SellerControlController@welcome');

Route::group(['module' => 'SellerControl', 'middleware' => ['web','adminmiddleware']], function() {

    include('settings_routes.php');

});

include('guest_routes.php');