<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->unique();
            $table->string('slug',64)->unique()->nullable();
            $table->string('title_bn',64)->unique()->nullable();
            $table->string('title_hi',64)->unique()->nullable();
            $table->string('title_ch',64)->unique()->nullable();
            $table->integer('quantity')->nullable();
             $table->enum('status',array('active','inactive','cancel'))->nullable();
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
        Schema::dropIfExists('unit');
    }
}
