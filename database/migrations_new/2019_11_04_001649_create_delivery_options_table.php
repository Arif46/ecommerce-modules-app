<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_method', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id')->nullable();
            
            $table->text('shipping_type')->nullable();
            $table->text('shipping_type_bn',32)->nullable();           
            $table->text('shipping_type_hi',32)->nullable();
            $table->text('shipping_type_ch',32)->nullable();
            
            $table->decimal('shipping_value',10,4)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('seller_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_method');
    }
}
