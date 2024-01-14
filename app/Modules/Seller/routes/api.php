<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Seller', 'middleware' => ['api']], function() {

   // Route::resource('seller', 'SellerController');

});
