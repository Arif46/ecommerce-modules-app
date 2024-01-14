<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type',array('simple-product','configurable-product','group-product'))->nullable();
            $table->string('title',128)->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();

            $table->string('slug',128)->unique()->nullable();
            $table->string('item_no',64)->unique()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->string('is_featured',32)->nullable();
            $table->decimal('sell_price',10,4)->nullable();
            $table->decimal('list_price',10,4)->nullable();

            $table->text('short_description')->nullable();
            $table->text('short_description_bn')->nullable();
            $table->text('short_description_hi')->nullable();
            $table->text('short_description_ch')->nullable();

            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->text('description_hi')->nullable();
            $table->text('description_ch')->nullable();

            $table->text('specification')->nullable();
            $table->text('specification_bn')->nullable();
            $table->text('specification_hi')->nullable();
            $table->text('specification_ch')->nullable(); 

            $table->unsignedInteger('attribute_set_id')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->unsignedInteger('seller_id')->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';

            $table->foreign('attribute_set_id')->references('id')->on('attribute_set');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('brand_id')->references('id')->on('brands');
        });

        Schema::create('product_attribute', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->string('attribute_code',20)->nullable();
            $table->text('attribute_data')->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();
            $table->engine= 'InnoDB';
            
            $table->foreign('product_id')->references('id')->on('product');
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();

            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
            
        });

        Schema::create('product_image', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            
            $table->string('image_link',128)->nullable();
            $table->string('image',128)->nullable();
            
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('product_id')->references('id')->on('product');
        });

        Schema::create('product_review', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();

            $table->float('rating_value_score',10,4)->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('title',128)->nullable();
            $table->text('review')->nullable();

            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('product_id')->references('id')->on('product');
        });

        Schema::create('product_seo', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();

            $table->string('meta_title',64)->nullable();
            $table->string('meta_keywords',128)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image_link',128)->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
            
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_attribute');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product_image');
        Schema::dropIfExists('product_review');
        Schema::dropIfExists('product_seo');
    }
}
