<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Category', 'middleware' => ['web','adminmiddleware']], function() {
      include('category_route.php');
});
