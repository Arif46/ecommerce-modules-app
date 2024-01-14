<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Product', 'middleware' => ['web','adminmiddleware']], function() {

   include('product_route.php');

});