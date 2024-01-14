<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Slider', 'middleware' => ['adminmiddleware','web']], function() {

    include('slider_route.php');	

});
