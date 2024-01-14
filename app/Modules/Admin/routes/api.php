<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Admin', 'middleware' => ['api']], function() {

    Route::resource('admin', 'AdminController');

});
