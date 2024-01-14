<?php

Route::get('seller-area', [
    'as' => 'seller.area',
    'uses' => 'WebSellerController@index'
]);

Route::get('seller-area/registration', [
    'as' => 'registration.seller.area',
    'uses' => 'WebSellerController@registration'
]);


Route::post('seller/do-registration', [
    'as' => 'seller.do_registration',
    'uses' => 'WebSellerController@do_registration'
]);

Route::get('seller/confirm-email/{slug}', 'WebSellerController@confirm_email');

Route::get('seller/login', [
    'as' => 'login.seller.area',
    'uses' => 'WebSellerController@login'
]);

Route::post('seller/post-login', [
    'as' => 'seller.post.login',
    'uses' => 'WebSellerController@post_login_seller'
]);

Route::group(['module' => 'Seller', 'middleware' => ['web', 'WebSellermiddleware']], function () {

    Route::get('seller/editOtherProfileInfo', [
        'as' => 'seller.editOtherProfileInfo',
        'uses' => 'WebSellerController@editOtherProfileInfo'
    ]);
    Route::get('seller/dashboard', [
        'as' => 'seller.dashboard',
        'uses' => 'WebSellerController@dashboard'
    ]);

    Route::get('seller/profile', [
        'as' => 'seller.profile',
        'uses' => 'WebSellerController@seller_profile'
    ]);

    Route::post('seller/edit-profile', [
        'as' => 'seller.post.edit.profile',
        'uses' => 'WebSellerController@edit_seller_profile'
    ]);

    Route::post('seller/shop_logo', [
        'as' => 'seller.shop_logo',
        'uses' => 'WebSellerController@shop_logo'
    ]);

    Route::post('seller/shop_banner', [
        'as' => 'seller.shop_banner',
        'uses' => 'WebSellerController@shop_banner'
    ]);

    Route::get('seller/my-product', [
        'as' => 'seller.my.product',
        'uses' => 'WebSellerController@my_product'
    ]);

    Route::get('seller/product-search', [
        'as' => 'seller.product.search',
        'uses' => 'WebSellerController@search'
    ]);

    Route::get('seller/add-product', [
        'as' => 'seller.add.product',
        'uses' => 'WebSellerController@add_product'
    ]);

    Route::get('seller/delivery-option', [
        'as' => 'seller.delivery.option',
        'uses' => 'WebSellerController@delivery_option'
    ]);

    Route::get('seller/delivery-option-create', [
        'as' => 'seller.delivery.option.create',
        'uses' => 'WebSellerController@delivery_option_create'
    ]);

    Route::post('seller/delivery-option-store', [
        'as' => 'seller.delivery.option.store',
        'uses' => 'WebSellerController@delivery_option_store'
    ]);

    Route::get('seller-delivery-option-edit/{id}', [
        'as' => 'seller.delivery.option.edit',
        'uses' => 'WebSellerController@delivery_option_edit'
    ]);

    Route::patch('seller-delivery-option-update/{id}', [
        'as' => 'seller.delivery.option.update',
        'uses' => 'WebSellerController@delivery_option_update'
    ]);

    Route::get('seller/seller-product-details/{id}', [
        'as' => 'seller.product.details',
        'uses' => 'WebSellerController@product_details'
    ]);

    Route::post('seller/product-store', [
        'as' => 'seller.product.store',
        'uses' => 'WebSellerController@store'
    ]);

    Route::get('seller/product-edit/{id}', [
        'as' => 'seller.product.edit',
        'uses' => 'WebSellerController@edit'
    ]);

    Route::get('seller/product-duplicate/{id}', [
        'as' => 'seller.product.clone',
        'uses' => 'WebSellerController@duplicate'
    ]);

    Route::patch('seller-product-image-update/{id}', [
        'as' => 'seller.product.update_image',
        'uses' => 'WebSellerController@update_image'
    ]);

    Route::get('seller/product-report/{status}', [
        'as' => 'seller.product.report',
        'uses' => 'WebSellerController@product_report'
    ]);

    Route::get('seller/product-report-sold/{status}', [
        'as' => 'seller.product.report.sold',
        'uses' => 'WebSellerController@product_report_sold'
    ]);

    Route::get('seller/payment-report/{status}', [
        'as' => 'seller.payment.report',
        'uses' => 'WebSellerPaymentController@payment_report'
    ]);


    Route::get('seller/logout', [
        'as' => 'seller.logout',
        'uses' => 'WebSellerController@seller_logout'
    ]);

    Route::get('seller/order-index', [
        'as' => 'seller.order.index',
        'uses' => 'WebSellerOrderController@index'
    ]);

    Route::get('seller/order-search', [
        'as' => 'seller.order.search',
        'uses' => 'WebSellerOrderController@search'
    ]);

    Route::get('seller/payment-index', [
        'as' => 'seller.payment.index',
        'uses' => 'WebSellerPaymentController@index'
    ]);

    Route::get('seller/product-show/{id}', [
        'as' => 'seller.product.show',
        'uses' => 'WebSellerController@seller_product_show'
    ]);

    Route::get('seller/product-delete/{id}', [
        'as' => 'seller.product.delete',
        'uses' => 'WebSellerController@destroy'
    ]);

    Route::get('seller/product-review-delete/{id}', [
        'as' => 'seller.product.review.delete',
        'uses' => 'WebSellerController@review_destroy'
    ]);

    Route::get('seller/order-index', [
        'as' => 'seller.order.index',
        'uses' => 'WebSellerOrderController@index'
    ]);

    Route::get('seller/order-report/{status}', [
        'as' => 'seller.order.report',
        'uses' => 'WebSellerOrderController@order_report'
    ]);

    Route::get('seller/order-details/{id}', [
        'as' => 'seller.order.show',
        'uses' => 'WebSellerOrderController@show'
    ]);

    Route::get('seller/order-track/{id}', [
        'as' => 'seller.order.track',
        'uses' => 'WebSellerOrderController@track'
    ]);

    Route::get('seller/order-track-update/{id}', [
        'as' => 'seller.order.track.update',
        'uses' => 'WebSellerOrderController@track_update'
    ]);

    Route::get('seller/order-edit/{id}', [
        'as' => 'seller.order.edit',
        'uses' => 'WebSellerOrderController@edit'
    ]);

    Route::patch('seller/order-edit/{id}', [
        'as' => 'seller.order.edit.update',
        'uses' => 'WebSellerOrderController@order_update'
    ]);

    Route::get('seller/order-destroy/{id}', [
        'as' => 'seller.order.destroy',
        'uses' => 'WebSellerOrderController@destroy'
    ]);


    Route::patch('seller-basic-info-add/{id}', 'WebSellerController@update_basic');
    Route::patch('seller-description-update/{id}', 'WebSellerController@description_update');
    Route::patch('seller-seo-update/{id}', 'WebSellerController@seo_update');
    Route::patch('seller-category-update/{id}', 'WebSellerController@category_update');
    Route::patch('seller-product-shipping-update/{id}', 'WebSellerController@product_shipping_update');

    Route::patch('seller-product-coupon-update/{id}', 'WebSellerController@product_coupon_update');

    Route::patch('seller-inventory-update/{id}', 'WebSellerController@inventory_update');
    Route::get('seller-image-delete/{id}', 'WebSellerController@DeleteImage');
    /*product attribute update*/
    Route::post('seller-product-attribute-update', [
        'as' => 'seller.product.update.attribute',
        'uses' => 'WebSellerController@productAttributeUpdate'
    ]);


    include('seller_coupon.php');


});  // end seller middleware=======================

Route::get('seller/forget-password', [
    'as' => 'seller.forgetpassword',
    'uses' => 'WebSellerController@forget_password'
]);

Route::post('seller/send-mail', [
    'as' => 'seller.forgetpassword.sendmail',
    'uses' => 'WebSellerController@send_mail_to_seller'
]);

Route::get('seller-send-mail-for-password-reset/{slug}', 'WebSellerController@change_password_form');


Route::post('seller/save-change', [
    'as' => 'seller.password.change',
    'uses' => 'WebSellerController@save_chage_password'
]);

    Route::post('seller/do-change-password', [
        'as' => 'seller.do.change.password',
        'uses' => 'WebSellerController@do_change_password'
    ]);

