<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Common', 'middleware' => ['web','adminmiddleware']], function() {

	include('faq.php');	
	include('payment_options.php');	
	include('shipping_options.php');	
	include('coupon.php');	
	
});