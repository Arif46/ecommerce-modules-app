<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Seller', 'middleware' => ['web','adminmiddleware']], function() {

   include('admin_seller_route.php');

});

Route::group(['module' => 'Seller', 'middleware' => ['web']], function() {

    include('seller_route.php');

});