<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Cms', 'middleware' => ['web','adminmiddleware']], function() {

	include('cms.php');	
	// include('payment_options.php');	
	
});