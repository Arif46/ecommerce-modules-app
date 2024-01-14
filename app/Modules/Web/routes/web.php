<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Web', 'middleware' => ['web']], function() {

    Route::get('/','WebController@index');
    
    include('customer_route.php');
    include('product_route.php');
    include('category_route.php');
    include('cart_route.php');
    include('search_route.php');
    include('shop_route.php');
    include('brand_route.php');

    Route::get('home/onsell', [
        'as' => 'web.onsell',
        'uses' => 'WebController@onsell'
    ]);

    Route::get('home/customise', [
        'as' => 'web.customise',
        'uses' => 'WebController@customise'
    ]);

    Route::get('home/newarrivals', [
        'as' => 'web.newarrivals',
        'uses' => 'WebController@newarrivals'
    ]);

    Route::get('home/cmspage', [
        'as' => 'web.cmspage',
        'uses' => 'WebController@cmspage'
    ]);

    Route::get('home/faq', [
        'as' => 'web.faq',
        'uses' => 'WebController@faq'
    ]);
    
});
