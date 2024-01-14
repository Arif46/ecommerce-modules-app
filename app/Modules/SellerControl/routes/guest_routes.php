<?php
/*color*/
Route::get('merchant-signup', [
    'as' => 'merchant.signup',
    'uses' => 'SellerSignUpController@sellerSignUp'
]);
Route::post('merchant-signupStore', [
    'as' => 'merchant.signupStore',
    'uses' => 'SellerSignUpController@sellerSignUpStore'
]);