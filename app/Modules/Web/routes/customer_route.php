<?php

/*------------------------------------*/

/*customer */

use App\Modules\Web\Http\Controllers\WebCustomerController;

Route::group(['module' => 'Web', 'middleware' => ['web', 'webcustomermiddleware']], function () {

    Route::get('customer/dashboard', [
        'as' => 'customer.dashboard',
        'uses' => 'WebCustomerController@dashboard'
    ]);

    Route::get('customer/profile', [
        'as' => 'customer.profile',
        'uses' => 'WebCustomerController@profile'
    ]);

    Route::post('customer/do-customer-edit-info', [
        'as' => 'customer.do_customer_edit_info',
        'uses' => 'WebCustomerController@do_customer_edit_information'
    ]);

    Route::get('customer/address', [
        'as' => 'customer.address',
        'uses' => 'WebCustomerController@address'
    ]);

    Route::post('customer/billing-shipping-store', [
        'as' => 'customer.billing.shipping.store',
        'uses' => 'WebCustomerController@store_billing_shipping'
    ]);

    Route::get('customer-billing-shipping-address-edit/{id}', [
        'as' => 'customer.edit.shipping.billing.address',
        'uses' => 'WebCustomerController@edit_billing_address'
    ]);

    Route::patch('customer-update-billing-shipping-info/{id}', [
        'as' => 'customer.update.billing.shipping.info',
        'uses' => 'WebCustomerController@update_billing_shipping_address'
    ]);

    Route::get('customer-delete-shipping-billing-address/{id}', [
        'as' => 'customer.delete.shipping.billing.address',
        'uses' => 'WebCustomerController@destroy_billing_shipping'
    ]);

    Route::post('customer/do-change-password', [
        'as' => 'customer.do.change.password',
        'uses' => 'WebCustomerController@do_change_password'
    ]);

    Route::get('customer/logout', [
        'as' => 'customer.logout',
        'uses' => 'WebCustomerController@customer_logout'
    ]);

    Route::get('customer/order/{status}', [
        'as' => 'customer.order',
        'uses' => 'WebCustomerController@customer_order'
    ]);

    Route::get('customer/order-track/{id}', [
        'as' => 'customer.order.track',
        'uses' => 'WebCustomerController@track'
    ]);

    Route::get('customer/customer-order-show/{id}', [
        'as' => 'customer.order.show',
        'uses' => 'WebCustomerController@show_order'
    ]);

//    Route::get('customer/wishlist', [
//        'as' => 'customer.wishlist',
//        'uses' => 'WebCustomerController@wishlist'
//    ]);
    Route::get('customer/wishlist', [WebCustomerController::class, 'wishlist'])->name('customer.wishlist');
    Route::any('customer-add-to-wishlist', [
        'as' => 'customer.add.to.wishlist',
        'uses' => 'WebCustomerController@add_to_wishlist'
    ]);

    Route::get('customer-remove-to-wishlist/{id}', [
        'as' => 'customer.remove.to.wishlist',
        'uses' => 'WebCustomerController@destroy_wishlist'
    ]);

    Route::get('customer/review', [
        'as' => 'customer.review',
        'uses' => 'WebCustomerController@review'
    ]);

    Route::post('customer-review-post', [
        'as' => 'customer-review-post',
        'uses' => 'WebReviewController@post_customer_review'
    ]);

});

//end customer middilware

Route::group(['module' => 'Web', 'middleware' => ['web']], function () {

    Route::get('customer-remove-list/{id}', [
        'as' => 'customer.list',
        'uses' => 'WebReviewController@show'
    ]);

    Route::get('customer/login', [
        'as' => 'customer.login',
        'uses' => 'WebCustomerController@login'
    ]);


    Route::get('customer/sign-up', [WebCustomerController::class, 'sign_up'])->name('customer.sign.up');


    Route::get('customer/do_register', [WebCustomerController::class, 'do_register'])->name('customer.do_register');


    Route::post('customer/do-register', [WebCustomerController::class, 'do_register'])->name('customer.do_register');
    Route::get('registration-confirmation/{slug}', [WebCustomerController::class, 'confirm_email']);

//    Route::get('registration-confirmation/{slug}','WebCustomerController@confirm_email');

    Route::get('checkout/do-register', [
        'as' => 'customer.sign.up.from.checkout.page',
        'uses' => 'WebCustomerController@do_register_checkout'
    ]);

    Route::post('checkout/do-register', [
        'as' => 'customer.sign.up.from.checkout.page',
        'uses' => 'WebCustomerController@do_register_checkout'
    ]);

    Route::post('customer/post-login', [
        'as' => 'customer.post.login',
        'uses' => 'WebCustomerController@post_login'
    ]);

    //checkout login

    Route::post('checkout-customer/post-login', [
        'as' => 'checkout.post.login',
        'uses' => 'WebCustomerController@customer_post_login'
    ]);

    Route::get('customer/reset-password', [
        'as' => 'customer.resetpassword',
        'uses' => 'WebCustomerController@reset_password'
    ]);

    Route::post('customer/send-mail', [
        'as' => 'customer.resetpassword.sendmail',
        'uses' => 'WebCustomerController@sendmailtouser'
    ]);

    Route::post('customer/save-change', [
        'as' => 'customer.pass.change',
        'uses' => 'WebCustomerController@save_chage_password'
    ]);

    Route::get('request-email-change/{slug}', 'WebCustomerController@change_form');

});
