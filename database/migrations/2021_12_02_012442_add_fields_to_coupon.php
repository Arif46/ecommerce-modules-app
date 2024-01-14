<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupon', function (Blueprint $table) {
            $table->float('coupon_percentage')->default(0)->after('amount');
            $table->enum('coupon_calculation_type', ['fixed', 'percentage'])->after('coupon_percentage');
            $table->tinyInteger('how_many_top_buyers')->default(0)->after('coupon_calculation_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon', function (Blueprint $table) {

        });
    }
}
