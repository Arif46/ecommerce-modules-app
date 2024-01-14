<?php
/*color*/
Route::get('admin-complain-suggestion-index', [
    'as' => 'admin.complain.suggestion.index',
    'uses' => 'ComplainSuggestionController@index'
]);

Route::get('admin-notice-create', [
    'as' => 'admin.notice.create',
    'uses' => 'ComplainSuggestionController@create'
]);

Route::post('admin-complain-suggestion-store', [
    'as' => 'admin.complain.suggestion.store',
    'uses' => 'ComplainSuggestionController@store'
]);

Route::get('admin-complain-suggestion-show/{id}', [
    'as' => 'admin.complain.suggestion.show',
    'uses' => 'ComplainSuggestionController@show'
]);

Route::get('admin-notic-edit/{id}', [
    'as' => 'admin.notic.edit',
    'uses' => 'ComplainSuggestionController@edit'
]);

Route::patch('admin-complain-suggestion-update/{id}', [
    'as' => 'admin.complain.suggestion.update',
    'uses' => 'ComplainSuggestionController@update'
]);

Route::get('admin-complain-suggestion-destroy/{id}', [
    'as' => 'admin.complain.suggestion.destroy',
    'uses' => 'ComplainSuggestionController@destroy'
]);

Route::get('admin-complain-suggestion-search', [
    'as' => 'admin.complain.suggestion.search',
    'uses' => 'ComplainSuggestionController@search'
]);

Route::get('admin-notice-index', [
    'as' => 'admin.notice.index',
    'uses' => 'ComplainSuggestionController@indexNotice'
]);