<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->nullable();
            
            $table->string('shop_name',128)->nullable();
            $table->string('shop_name_bn',128)->nullable();
            $table->string('shop_name_hi',128)->nullable();
            $table->string('shop_name_ch',128)->nullable();
            
            $table->string('nid',32)->nullable();
            $table->string('tin_no',64)->nullable();
            $table->string('lic_no',64)->nullable();

            $table->text('shop_address')->nullable();
            $table->text('shop_address_bn')->nullable();
            $table->text('shop_address_hi')->nullable();
            $table->text('shop_address_ch')->nullable();

            $table->text('shop_description')->nullable();
            $table->text('shop_description_bn')->nullable();
            $table->text('shop_description_hi')->nullable();
            $table->text('shop_description_ch')->nullable();

            $table->text('shop_agreement')->nullable();
            $table->text('shop_agreement_bn')->nullable();
            $table->text('shop_agreement_hi')->nullable();
            $table->text('shop_agreement_ch')->nullable();

            $table->date('agreement_date')->nullable();
            
            $table->text('agreement_details')->nullable();
            $table->text('agreement_details_bn')->nullable();
            $table->text('agreement_details_hi')->nullable();
            $table->text('agreement_details_ch')->nullable();

            $table->text('first_contact_person_details')->nullable();
            $table->text('first_contact_person_details_bn')->nullable();
            $table->text('first_contact_person_details_hi')->nullable();
            $table->text('first_contact_person_details_ch')->nullable();

            $table->text('second_contact_person_details')->nullable();
            $table->text('second_contact_person_details_bn')->nullable();
            $table->text('second_contact_person_details_hi')->nullable();
            $table->text('second_contact_person_details_ch')->nullable();
            
            $table->string('file_one')->nullable();
            $table->string('file_two')->nullable();
            $table->string('file_three')->nullable();
            $table->string('file_four')->nullable(); 

            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_profiles');
    }
}
