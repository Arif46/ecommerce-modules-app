<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'User', 'middleware' => ['web','adminmiddleware']], function() {

    include('user_route.php');
    include('customer_route.php');
    include('seller_route.php');
    
});