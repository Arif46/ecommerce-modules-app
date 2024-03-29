<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_set', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title',32)->nullable();
            $table->string('title_bn',32)->nullable();
            $table->string('title_hi',32)->nullable();
            $table->string('title_ch',32)->nullable();

            $table->string('slug',32)->unique()->nullable();
            
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
        Schema::dropIfExists('attribute_set');
    }
}
