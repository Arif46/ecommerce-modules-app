<?php

use App\Modules\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Admin', 'middleware' => ['web']], function() {

   // Route::resource('admin', 'AdminController');
	Route::get('admin-login','Auth\LoginController@index');
	Route::post('do-login','Auth\LoginController@post_login');
	Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');

});


Route::group(['module' => 'Admin', 'middleware' => ['web','adminmiddleware']], function() {

	Route::get('admin-dashboard', 'AdminController@index');
	Route::get('seller-pending', [AdminController::class,'pendingSeller'])->name('admin.seller.pending');
	Route::delete('verified-status/{id}', [AdminController::class,'verifiedStatus'])->name('admin.verified.status');
	Route::delete('cancel-status/{id}', [AdminController::class,'cancelStatus'])->name('admin.cancel.status');
	Route::get('seller-details/{id}', [AdminController::class,'getSellerDetails'])->name('admin.seller.details');
});
