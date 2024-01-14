<?php

Route::group(['module' => 'Admanager', 'middleware' => ['api']], function() {

    Route::resource('admanager', 'AdmanagerController');

});
