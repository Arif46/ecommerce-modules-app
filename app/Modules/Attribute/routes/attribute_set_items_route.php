<?php

/*------------------------------------*/
/* attribute set items */


Route::get('admin-attribute-set-items/{id}', [
    'as' => 'admin.attribute.set.items',
    'uses' => 'AttributesetController@set_items'
]);

Route::get('admin-attribute-set-items-search', [
    'as' => 'admin.attribute.set.items.search',
    'uses' => 'AttributesetController@search'
]);

Route::post('admin-attribute-set-items-store', [
    'as' => 'admin.attribute.set.items.assigned.store',
    'uses' => 'AttributesetController@assigned_store'
]);

Route::post('admin-attribute-set-items-unassigned', [
    'as' => 'admin.attribute.set.items.unassigned.store',
    'uses' => 'AttributesetController@unassigned_store'
]);





