<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsForMultiLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //done
        Schema::table('category', function (Blueprint $table) {

            $table->string('title_bn',32)->nullable()->after('title');
            $table->string('title_hi',32)->nullable()->after('title_bn');
            $table->string('title_ch',32)->nullable()->after('title_hi');
            $table->text('description_bn')->nullable()->after('description');
            $table->text('description_hi')->nullable()->after('description_bn');
            $table->text('description_ch')->nullable()->after('description_hi');
            $table->string('meta_title_bn',32)->nullable()->after('meta_title');
            $table->string('meta_title_hi',32)->nullable()->after('meta_title_bn');
            $table->string('meta_title_ch',32)->nullable()->after('meta_title_hi');
            $table->text('meta_description_bn')->nullable()->after('meta_description');
            $table->text('meta_description_hi')->nullable()->after('meta_description_bn');
            $table->text('meta_description_ch')->nullable()->after('meta_description_hi');
            $table->string('meta_keywords_bn',128)->nullable()->after('meta_keywords');
            $table->string('meta_keywords_hi',128)->nullable()->after('meta_keywords_bn');
            $table->string('meta_keywords_ch',128)->nullable()->after('meta_keywords_hi');
        });

//done
        Schema::table('attribute', function (Blueprint $table) {
            $table->string('backend_title_bn',32)->nullable()->after('backend_title');
            $table->string('backend_title_hi',32)->nullable()->after('backend_title_bn');
            $table->string('backend_title_ch',32)->nullable()->after('backend_title_hi');
            $table->string('frontend_title_bn',32)->nullable()->after('frontend_title');
            $table->string('frontend_title_hi',32)->nullable()->after('frontend_title_bn');
            $table->string('frontend_title_ch',32)->nullable()->after('frontend_title_hi');

            $table->string('default_value_bn',32)->nullable()->after('default_value');
            $table->string('default_value_hi',32)->nullable()->after('default_value_bn');
            $table->string('default_value_ch',32)->nullable()->after('default_value_hi');
        });


//done
        Schema::table('attribute_set', function (Blueprint $table) {
            $table->string('title_bn',32)->nullable()->after('title');
            $table->string('title_hi',32)->nullable()->after('title_bn');
            $table->string('title_ch',32)->nullable()->after('title_hi');           
        });

        //done
        Schema::table('attribute_option', function (Blueprint $table) {
            $table->string('backend_title_bn',32)->nullable()->after('backend_title');
            $table->string('backend_title_hi',32)->nullable()->after('backend_title_bn');
            $table->string('backend_title_ch',32)->nullable()->after('backend_title_hi');
            $table->string('frontend_title_bn',32)->nullable()->after('frontend_title');
            $table->string('frontend_title_hi',32)->nullable()->after('frontend_title_bn');
            $table->string('frontend_title_ch',32)->nullable()->after('frontend_title_hi');           
        });

    //done
        Schema::table('slider', function (Blueprint $table) {
            $table->string('title_bn',32)->nullable()->after('title');
            $table->string('title_hi',32)->nullable()->after('title_bn');
            $table->string('title_ch',32)->nullable()->after('title_hi');
            $table->string('caption_bn',255)->nullable()->after('caption');
            $table->string('caption_hi',255)->nullable()->after('caption_bn');
            $table->string('caption_ch',255)->nullable()->after('caption_hi');           
        });
    //done with show
        Schema::table('faq', function (Blueprint $table) {
            $table->string('title_bn',32)->nullable()->after('title');
            $table->string('title_hi',32)->nullable()->after('title_bn');
            $table->string('title_ch',32)->nullable()->after('title_hi');
            $table->text('description_bn')->nullable()->after('description');
            $table->text('description_hi')->nullable()->after('description_bn');
            $table->text('description_ch')->nullable()->after('description_hi');           
        });


        //done with show
        Schema::table('product', function (Blueprint $table) {
            $table->string('title_bn',32)->nullable()->after('title');
            $table->string('title_hi',32)->nullable()->after('title_bn');
            $table->string('title_ch',32)->nullable()->after('title_hi');
            $table->text('short_description_bn')->nullable()->after('short_description');
            $table->text('short_description_hi')->nullable()->after('short_description_bn');
            $table->text('short_description_ch')->nullable()->after('short_description_hi');
            $table->text('description_bn')->nullable()->after('description');
            $table->text('description_hi')->nullable()->after('description_bn');
            $table->text('description_ch')->nullable()->after('description_hi');  
            $table->text('specification_bn')->nullable()->after('specification');
            $table->text('specification_hi')->nullable()->after('specification_bn');
            $table->text('specification_ch')->nullable()->after('specification_hi');            
        });


        Schema::table('order_head', function (Blueprint $table) {
            $table->string('note_bn',32)->nullable()->after('note');           
            $table->string('note_hi',32)->nullable()->after('note_bn');
            $table->string('note_ch',32)->nullable()->after('note_hi');           
        });


        Schema::table('product_inventory', function (Blueprint $table) {
            $table->string('note_bn',32)->nullable()->after('note');           
            $table->string('note_hi',32)->nullable()->after('note_bn');
            $table->string('note_ch',32)->nullable()->after('note_hi');           
        });


        Schema::table('seller_profiles', function (Blueprint $table) {
            $table->string('shop_name_bn',128)->nullable()->after('shop_name');
            $table->string('shop_name_hi',128)->nullable()->after('shop_name_bn');
            $table->string('shop_name_ch',128)->nullable()->after('shop_name_hi');
            $table->text('shop_address_bn')->nullable()->after('shop_address');
            $table->text('shop_address_hi')->nullable()->after('shop_address_bn');
            $table->text('shop_address_ch')->nullable()->after('shop_address_hi');
            $table->text('shop_description_bn')->nullable()->after('shop_description');
            $table->text('shop_description_hi')->nullable()->after('shop_description_bn');
            $table->text('shop_description_ch')->nullable()->after('shop_description_hi');
            $table->text('shop_agreement_bn')->nullable()->after('shop_agreement');
            $table->text('shop_agreement_hi')->nullable()->after('shop_agreement_bn');
            $table->text('shop_agreement_ch')->nullable()->after('shop_agreement_hi');
            $table->text('agreement_details_bn')->nullable()->after('agreement_details');
            $table->text('agreement_details_hi')->nullable()->after('agreement_details_bn');
            $table->text('agreement_details_ch')->nullable()->after('agreement_details_hi');
            $table->text('first_contact_person_details_bn')->nullable()->after('first_contact_person_details');
            $table->text('first_contact_person_details_hi')->nullable()->after('first_contact_person_details_bn');
            $table->text('first_contact_person_details_ch')->nullable()->after('first_contact_person_details_hi');
            $table->text('second_contact_person_details_bn')->nullable()->after('second_contact_person_details');
            $table->text('second_contact_person_details_hi')->nullable()->after('second_contact_person_details_bn');
            $table->text('second_contact_person_details_ch')->nullable()->after('second_contact_person_details_hi');
            $table->string('file_one')->nullable()->after('second_contact_person_details_ch');
            $table->string('file_two')->nullable()->after('file_one');
            $table->string('file_three')->nullable()->after('file_two');
            $table->string('file_four')->nullable()->after('file_three');           
        });

        Schema::table('shipping_method', function (Blueprint $table) {
            $table->string('shipping_type_bn',32)->nullable()->after('shipping_type');           
            $table->string('shipping_type_hi',32)->nullable()->after('shipping_type_bn');           
            $table->string('shipping_type_ch',32)->nullable()->after('shipping_type_hi');           
        });



        Schema::table('payment_options', function (Blueprint $table) {
            $table->string('payment_type_bn',32)->nullable()->after('payment_type');           
            $table->string('payment_type_hi',32)->nullable()->after('payment_type_bn');           
            $table->string('payment_type_ch',32)->nullable()->after('payment_type_hi');           
        });

//doing
        Schema::table('coupon', function (Blueprint $table) {
            $table->string('coupon_name_bn',32)->nullable()->after('coupon_name');
            $table->string('coupon_name_hi',32)->nullable()->after('coupon_name_bn');
            $table->string('coupon_name_ch',32)->nullable()->after('coupon_name_hi');           
            $table->string('coupon_type_bn',32)->nullable()->after('coupon_type');
            $table->string('coupon_type_hi',32)->nullable()->after('coupon_type_bn');
            $table->string('coupon_type_ch',32)->nullable()->after('coupon_type_hi');           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
