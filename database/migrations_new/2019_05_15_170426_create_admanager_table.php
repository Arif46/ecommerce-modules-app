<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admanager', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_hi')->nullable();
            $table->string('title_ch')->nullable();

            $table->string('slug')->nullable();

            $table->text('caption')->nullable();
            $table->text('caption_bn')->nullable();
            $table->text('caption_hi')->nullable();
            $table->text('caption_ch')->nullable(); 

            $table->string('route')->nullable();

            $table->integer('short_order')->nullable();
            $table->string('image_link')->nullable();
            $table->enum('type',array('home', 'shop', 'corporate', 'others'))->nullable();
            $table->enum('position',array('top', 'popup', 'footer', 'bottom', 'slider'))->nullable();
            
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
        Schema::dropIfExists('faq');
    }
}
