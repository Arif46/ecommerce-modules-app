<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            
            $table->string('warehouse',32)->nullable();
            $table->string('item_number',32)->nullable();
            $table->string('quantity',8)->nullable();
            $table->text('note')->nullable();
            $table->string('note_bn',32)->nullable();           
            $table->string('note_hi',32)->nullable();
            $table->string('note_ch',32)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            
            $table->float('product_in_quantity',8,2)->nullable()->comment('Total product quantity');
            $table->float('product_out_quantity',8,2)->nullable()->comment('Total product quantity');
       
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();

            $table->timestamps();

            $table->engine= 'InnoDB';

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('product_inventory');
    }
}
