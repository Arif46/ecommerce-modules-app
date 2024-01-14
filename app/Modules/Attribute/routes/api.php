<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Attribute', 'middleware' => ['api']], function() {

    Route::resource('attribute', 'AttributeController');

});
