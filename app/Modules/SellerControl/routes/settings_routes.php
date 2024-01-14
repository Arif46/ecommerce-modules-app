<?php
/*color*/
Route::get('seller-control-settings-index', [
    'as' => 'seller.control.settings.index',
    'uses' => 'SellerVerificationDocumentSettingsController@index'
]);

Route::get('seller-control-settings-create', [
    'as' => 'seller.control.settings.create',
    'uses' => 'SellerVerificationDocumentSettingsController@create'
]);

Route::post('seller-control-settings-store', [
    'as' => 'seller.control.settings.store',
    'uses' => 'SellerVerificationDocumentSettingsController@store'
]);

Route::get('seller-control-settings-show/{id}', [
    'as' => 'seller.control.settings.show',
    'uses' => 'SellerVerificationDocumentSettingsController@show'
]);

Route::get('seller-control-settings-edit/{id}', [
    'as' => 'seller.control.settings.edit',
    'uses' => 'SellerVerificationDocumentSettingsController@edit'
]);

Route::patch('seller-control-settings-update/{id}', [
    'as' => 'seller.control.settings.update',
    'uses' => 'SellerVerificationDocumentSettingsController@update'
]);

Route::get('seller-control-settings-destroy/{id}', [
    'as' => 'seller.control.settings.destroy',
    'uses' => 'SellerVerificationDocumentSettingsController@destroy'
]);

Route::get('seller-control-settings-search', [
    'as' => 'seller.control.settings.search',
    'uses' => 'SellerVerificationDocumentSettingsController@search'
]);