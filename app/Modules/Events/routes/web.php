<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Events', 'middleware' => ['web']], function() {

    include('events_route.php');	

});
