<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Product', 'middleware' => ['api']], function() {

    Route::resource('product', 'ProductController');

});
