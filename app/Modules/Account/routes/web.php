<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Account', 'middleware' => ['web','adminmiddleware']], function() {

     Route::get('account', 'AccountController@welcome');
     Route::get('account-details-list', 'AccountController@index');

});
