<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title',64)->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();
            
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->text('description_hi')->nullable();
            $table->text('description_ch')->nullable(); 
           
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
