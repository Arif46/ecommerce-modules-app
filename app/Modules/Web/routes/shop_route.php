<?php

     Route::get('shoplist', [
        'as' => 'shop.shoplist',
        'uses' => 'WebShopController@shoplist'
    ]);

    Route::get('shoppro/{id}', [
        'as' => 'shop.shoppro',
        'uses' => 'WebShopController@shoppro'
    ]);