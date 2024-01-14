<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shipping', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('shipping_method_id')->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shipping');
    }
}
