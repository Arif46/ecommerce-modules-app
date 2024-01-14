<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Events', 'middleware' => ['api']], function() {

    Route::resource('events', 'EventsController');

});
