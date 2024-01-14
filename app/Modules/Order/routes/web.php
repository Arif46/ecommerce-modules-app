<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Order', 'middleware' => ['web']], function() {

	include('order_route.php');
	include('payment_route.php');

});
