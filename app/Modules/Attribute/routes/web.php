<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Attribute', 'middleware' => ['web','adminmiddleware']], function() {

	include('attribute.php');
	include('attribute_set_route.php');
	include('attribute_set_items_route.php');

});
