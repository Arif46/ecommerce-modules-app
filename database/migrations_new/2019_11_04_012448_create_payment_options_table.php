<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('payment_options', function (Blueprint $table) {
            $table->increments('id');
            $table->text('payment_type')->nullable();
            $table->text('payment_type_bn',32)->nullable();           
            $table->text('payment_type_hi',32)->nullable();           
            $table->text('payment_type_ch',32)->nullable();

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
        Schema::dropIfExists('payment_options');
    }
}
