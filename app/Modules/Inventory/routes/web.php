<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Seller', 'middleware' => ['web','adminmiddleware']], function() {

   include('inventory_routes.php');
});