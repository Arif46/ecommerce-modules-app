<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->unique();
            $table->string('slug',64)->unique()->nullable();
            $table->string('title_bn',64)->unique()->nullable();
            $table->string('title_hi',64)->unique()->nullable();
            $table->string('title_ch',64)->unique()->nullable();
            $table->text('description')->nullable()->comment('size description');
            $table->text('description_bn')->nullable()->comment('size description');
            $table->text('description_hi')->nullable()->comment('size description');
            $table->text('description_ch')->nullable()->comment('size description');
            $table->string('size_img')->nullable()->comment('size Image');
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
        Schema::dropIfExists('size');
    }
}
