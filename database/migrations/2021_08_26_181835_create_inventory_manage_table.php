<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product_in', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            $table->float('product_quantity',8,2)->comment('Total product quantity');       
            $table->dateTimeTz('product_in_date');
            $table->engine= 'InnoDB';

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('seller_id')->references('id')->on('users'); 
        }); 


        Schema::create('product_out', function (Blueprint $table) {           
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();

            $table->float('product_quantity',8,2)->comment('Total product quantity');
       
            $table->dateTimeTz('product_out_date');
            $table->engine= 'InnoDB';

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('seller_id')->references('id')->on('users'); 
            $table->foreign('customer_id')->references('id')->on('users'); 
        }); 

        Schema::table('product_inventory', function (Blueprint $table) {
            


            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            
            $table->float('product_in_quantity',8,2)->nullable()->comment('Total product quantity');
            $table->float('product_out_quantity',8,2)->nullable()->comment('Total product quantity');
       
            $table->engine= 'InnoDB';

//            $table->foreign('product_id')->references('id')->on('product');
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
        Schema::dropIfExists('product_in');
        Schema::dropIfExists('product_out');
        Schema::table('product_inventory', function (Blueprint $table) {



            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->unsigned()->nullable();
            $table->unsignedInteger('seller_id')->nullable();

            $table->float('product_in_quantity',8,2)->comment('Total product quantity');
            $table->float('product_out_quantity',8,2)->comment('Total product quantity');

            $table->engine= 'InnoDB';

//            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('seller_id')->references('id')->on('users');

        });

    }
}
