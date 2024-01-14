<?php
	Route::get('shop/{slug}', [
	    'as' => 'category.slug',
	    'uses' => 'WebCategoryController@index'
	]);