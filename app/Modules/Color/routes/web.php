<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Color', 'middleware' => ['web','adminmiddleware']], function() {

    include('color_route.php');

});
