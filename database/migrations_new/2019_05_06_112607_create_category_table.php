<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',32)->unique()->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();
            $table->string('slug',32)->unique()->nullable();            
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->text('description_hi')->nullable();
            $table->text('description_ch')->nullable();
            $table->string('image_link',128)->nullable();
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
            $table->string('meta_keywords_bn',128)->nullable();
            $table->string('meta_keywords_hi',128)->nullable();
            $table->string('meta_keywords_ch',128)->nullable();
            $table->string('meta_image_link',128)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
            $table->engine= 'InnoDB';
            
        });
    }

    

    public function down()
    {
        Schema::dropIfExists('category');
    }
}
