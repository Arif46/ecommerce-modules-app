<?php

Route::group(['module' => 'Admanager', 'middleware' => ['web']], function() {

    include('admanager_route.php');	

});
