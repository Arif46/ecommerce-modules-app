<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableForColumnAddAndChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE users ADD UNIQUE (username,mobile_no)");
        });
        Schema::table('order_details', function (Blueprint $table) {

            $table->unsignedInteger('category_id')->nullable()->after('product_id');
            $table->unsignedInteger('brand_id')->nullable()->after('category_id');

             $table->foreign('category_id')->references('id')->on('category');
             $table->foreign('brand_id')->references('id')->on('brands');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE users ADD UNIQUE (username,mobile_no)");
        });
    }
}
