<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReceivedNoAtSellerPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_seller_payments', function (Blueprint $table) {
             $table->string('received_no')->nullable()->after('id');
        });

        Schema::table('product_in', function (Blueprint $table) {

            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();

            $table->foreign('color_id')->references('id')->on('color');
            $table->foreign('size_id')->references('id')->on('size');
        });


        Schema::table('product_out', function (Blueprint $table) {

            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();

            $table->foreign('color_id')->references('id')->on('color');
            $table->foreign('size_id')->references('id')->on('size');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_seller_payments', function (Blueprint $table) {
            $table->string('received_no')->nullable();           

        });

        Schema::table('product_in', function (Blueprint $table) {
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            
            $table->foreign('color_id')->references('id')->on('color');
            $table->foreign('size_id')->references('id')->on('size');

        });

        Schema::table('product_out', function (Blueprint $table) {
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            
            $table->foreign('color_id')->references('id')->on('color');
            $table->foreign('size_id')->references('id')->on('size');

        });
    }
}
