<?php

use Illuminate\Support\Facades\Route;
Route::group(['module' => 'SellerCommission', 'middleware' => ['web','adminmiddleware']], function() {
    include('seller_commission_route.php');
});
