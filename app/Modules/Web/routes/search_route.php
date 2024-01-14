<?php

	Route::any('search', [
	    'as' => 'search',
	    'uses' => 'WebSearchController@index'
	]);