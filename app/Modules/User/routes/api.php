<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'User', 'middleware' => ['api']], function() {

    Route::resource('user', 'UserController');

});
