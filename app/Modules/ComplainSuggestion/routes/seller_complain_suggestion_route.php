<?php
/*complain/suggestion or notice*/
Route::get('seller-notice-from-admin', [
    'as' => 'seller.complain.suggestion.index',
    'uses' => 'SellerComplainSuggestionController@index'
]);

Route::get('seller-complain-suggestion-create', [
    'as' => 'seller.complain.suggestion.create',
    'uses' => 'SellerComplainSuggestionController@create'
]);

Route::post('seller-complain-suggestion-store', [
    'as' => 'seller.complain.suggestion.store',
    'uses' => 'SellerComplainSuggestionController@store'
]);

Route::get('seller-complain-suggestion-show/{id}', [
    'as' => 'seller.complain.suggestion.show',
    'uses' => 'SellerComplainSuggestionController@show'
]);

Route::get('seller-complain-suggestion-search', [
    'as' => 'seller.complain.suggestion.search',
    'uses' => 'SellerComplainSuggestionController@search'
]);

