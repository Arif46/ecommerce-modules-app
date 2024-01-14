<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Order', 'middleware' => ['api']], function() {

    Route::resource('order', 'OrderController');

});
