<?php

use Illuminate\Support\Facades\Route;

Route::get('complain-suggestion', 'ComplainSuggestionController@welcome');

Route::group(['module' => 'ComplainSuggestion', 'middleware' => ['web','adminmiddleware']], function() {

    include('complain_suggestion_route.php');


});

Route::group(['module' => 'ComplainSuggestion', 'middleware' => ['web','WebSellermiddleware']], function () {
        include('seller_complain_suggestion_route.php');

    });
Route::group(['module' => 'ComplainSuggestion', 'middleware' => ['web']], function () {
        include('web_complain_suggestion_route.php');

    });