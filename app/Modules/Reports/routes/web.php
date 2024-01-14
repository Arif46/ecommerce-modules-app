<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Seller', 'middleware' => ['web','adminmiddleware']], function() {

   include('reports_routes.php');
});