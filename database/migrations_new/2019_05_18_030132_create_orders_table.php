<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_head', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('users_id')->nullable();
            $table->string('order_number',32)->nullable();
            $table->date('date')->nullable();
            $table->decimal('sub_total_price',10,4)->nullable();
            $table->decimal('total_price',10,4)->nullable();
            $table->string('payment_type',16)->nullable();            
            $table->text('note')->nullable(); 
            $table->text('note_bn',32)->nullable();           
            $table->text('note_hi',32)->nullable();
            $table->text('note_ch',32)->nullable();

            $table->enum('status',array('pending','confirmed','processing','packeting','on_transit','delivered','delivery_failed','returned','cancel'))->default('pending');
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_head_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('product_seller_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price',10,4)->nullable();
            $table->decimal('total_price',10,4)->nullable();
            $table->decimal('comission_price',10,4)->nullable();

            $table->string('size',50)->nullable();
            $table->string('color',50)->nullable();

            $table->decimal('shipping_cost',10,4)->nullable();
            $table->string('shipping_service',50)->nullable();

            $table->decimal('coupon_value',10,4)->nullable();
            $table->string('coupon_code',50)->nullable();
            
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('order_head_id')->references('id')->on('order_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('product_seller_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
        });

        Schema::create('order_shipping', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_head_id');

            $table->enum('type',array('billing','shipping'))->nullable();
            $table->string('name',32)->nullable(); 
            $table->string('email',32)->nullable(); 
            $table->text('address')->nullable(); 
            $table->integer('country')->nullable(); 
            $table->string('city',16)->nullable(); 
            $table->string('area',64)->nullable(); 
            $table->string('zip',16)->nullable(); 
            $table->string('phone',16)->nullable(); 
            $table->string('fax',16)->nullable(); 

            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('order_head_id')->references('id')->on('order_head');


        });


        Schema::create('order_transaction', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_head_id')->nullable();
            
            $table->string('transaction_number',32)->nullable();
            $table->date('date')->nullable();
            $table->decimal('amount',10,4)->nullable();

            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('order_head_id')->references('id')->on('order_head');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_head');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('order_shipping');
        Schema::dropIfExists('order_transaction');
    }
}
