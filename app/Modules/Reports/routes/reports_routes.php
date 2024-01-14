<?php

Route::get('report-product-in-list', [
    'as' => 'report.product.in.list',
    'uses' => 'ReportsController@indexIn'
]);


Route::get('report-product-out-list', [
    'as' => 'report.product.out.list',
    'uses' => 'ReportsController@indexOut'
]);


Route::get('report-product-stock-summary', [
    'as' => 'report.product.stock.summary',
    'uses' => 'ReportsController@indexStockSummary'
]);

Route::get('report-product-stock-details', [
    'as' => 'report.product.stock.details',
    'uses' => 'ReportsController@indexStockDetails'
]);




