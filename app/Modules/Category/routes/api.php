<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Category', 'middleware' => ['api']], function() {

    Route::resource('category', 'CategoryController');

});
