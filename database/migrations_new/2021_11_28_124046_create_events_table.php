<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->unique();
            $table->string('slug',64)->unique()->nullable();            
            $table->string('title_bn',64)->nullable();
            $table->string('title_hi',64)->nullable();
            $table->string('title_ch',64)->nullable();
            $table->text('caption',64)->nullable();
            $table->text('caption_bn',64)->nullable();
            $table->text('caption_hi',64)->nullable();
            $table->text('caption_ch',64)->nullable();
            $table->string('route',64)->nullable();
            $table->string('image_link')->nullable();
             $table->enum('type',array('home', 'block','news','slider','events','others'))->nullable();
             $table->enum('position',array('top','left','right','bottom','slider'))->nullable();
            $table->integer('short_order')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
