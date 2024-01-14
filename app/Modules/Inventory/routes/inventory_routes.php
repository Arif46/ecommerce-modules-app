<?php

Route::get('inventory-seller-summary-list', [
    'as' => 'inventory.seller.summary.list',
    'uses' => 'InventoryController@index'
]);

Route::get('inventory-height-selling-product', [
    'as' => 'inventory.height.selling.product',
    'uses' => 'InventoryController@height_selling_product'
]);

Route::get('inventory-height-selling-product-by-seller/{id}', [
    'as' => 'inventory.height.selling.product.by.seller',
    'uses' => 'InventoryController@height_selling_product_by_seller'
]);

Route::get('inventory-single-product-report/{id}', [
    'as' => 'inventory.single.product.report',
    'uses' => 'InventoryController@single_product_report'
]);


Route::get('inventory-height-selling-product-by-cat/{id}', [
    'as' => 'inventory.height.selling.product.by.cat',
    'uses' => 'InventoryController@height_selling_product_by_cat'
]);


Route::get('inventory-height-selling-product-by-brand/{id}', [
    'as' => 'inventory.height.selling.product.by.brand',
    'uses' => 'InventoryController@height_selling_product_by_brand'
]);


Route::get('inventory-all-seller-product-list/{id}', [
    'as' => 'inventory.all.seller.product.index',
    'uses' => 'InventoryController@seller_product_index'
]);

Route::get('inventory-all-seller-order-list/{id}', [
    'as' => 'inventory.all.seller.order.index',
    'uses' => 'InventoryController@seller_order_index'
]);

Route::get('inventory-all-seller-payment-list/{id}', [
    'as' => 'inventory.all.seller.payment.index',
    'uses' => 'InventoryController@seller_payment_index'
]);
