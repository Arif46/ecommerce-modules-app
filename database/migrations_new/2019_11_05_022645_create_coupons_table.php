<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('seller_id')->nullable();

            $table->string('coupon_name',64)->nullable();
            $table->string('coupon_name_bn',32)->nullable();
            $table->string('coupon_name_hi',32)->nullable();
            $table->string('coupon_name_ch',32)->nullable();           
        
            $table->string('coupon_code',64)->nullable();
            $table->string('coupon_type',64)->nullable();
            $table->string('coupon_type_bn',32)->nullable();
            $table->string('coupon_type_hi',32)->nullable();
            $table->string('coupon_type_ch',32)->nullable();

            $table->integer('start_coupon')->nullable();
            $table->integer('end_coupon')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->decimal('amount',10,4)->nullable();
            $table->enum('coupon_calculation_type', ['fixed', 'percentage']);
            $table->float('coupon_percentage', ['fixed', 'percentage']);
            $table->tinyInteger('how_many_top_buyers')->default(0);

            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');

            $table->engine= 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
}
