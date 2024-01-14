<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Cms', 'middleware' => ['api']], function() {

    Route::resource('cms', 'CmsController');

});
