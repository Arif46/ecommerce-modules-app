<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title',64)->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();

            $table->string('slug',64)->nullable();
            
            $table->string('caption',255)->nullable();
            $table->string('caption_bn',255)->nullable();
            $table->string('caption_hi',255)->nullable();
            $table->string('caption_ch',255)->nullable();

            $table->string('route',255)->nullable();
            $table->integer('short_order')->nullable();
            $table->string('image_link',128)->nullable();
            $table->enum('type',array('home'))->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('ordering')->default(0);
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
        Schema::dropIfExists('sliders');
    }
}
