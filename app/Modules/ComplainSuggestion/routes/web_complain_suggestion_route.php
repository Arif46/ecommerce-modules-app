<?php
/*complain or suggestion */

Route::get('customer-complain-suggestion-create', [
    'as' => 'customer.complain.suggestion.create',
    'uses' => 'WebComplainSuggestionController@create'
]);

Route::post('customer-complain-suggestion-store', [
    'as' => 'customer.complain.suggestion.store',
    'uses' => 'WebComplainSuggestionController@store'
]);



