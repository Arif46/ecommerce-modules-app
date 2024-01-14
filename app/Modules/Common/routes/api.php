<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Common', 'middleware' => ['api']], function() {

    Route::resource('common', 'CommonController');

});
