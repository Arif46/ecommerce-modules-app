<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
          Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',32)->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();
            $table->string('slug',32)->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->text('description_hi')->nullable();
            $table->text('description_ch')->nullable();
            $table->string('image_link',128)->nullable()->comment('Brand Logo');
            $table->integer('short_order')->nullable();
            $table->string('meta_title',32)->nullable();
            $table->string('meta_title_bn',32)->nullable();
            $table->string('meta_title_hi',32)->nullable();
            $table->string('meta_title_ch',32)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_description_bn')->nullable();
            $table->text('meta_description_hi')->nullable();
            $table->text('meta_description_ch')->nullable();
            $table->string('meta_keywords',128)->nullable();
            $table->string('meta_image_link',128)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('brands');
    }
}
