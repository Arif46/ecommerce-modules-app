<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Slider', 'middleware' => ['api']], function() {

    Route::resource('slider', 'SliderController');

});
