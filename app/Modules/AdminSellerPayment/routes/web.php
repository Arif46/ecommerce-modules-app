<?php

use Illuminate\Support\Facades\Route;

//Route::get('brands', 'BrandsController@welcome');
Route::group(['module' => 'AdminSellerPayment', 'middleware' => ['web','adminmiddleware']], function() {
    include('admin_seller_payment_route.php');
    include('seller_payment_approval_route.php');

});
