<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderingToCmsSliderFaqAdmanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->integer('ordering')->after('status')->default(0);
        });
        Schema::table('slider', function (Blueprint $table) {
            $table->integer('ordering')->after('status')->default(0);
        });
        Schema::table('faq', function (Blueprint $table) {
            $table->integer('ordering')->after('status')->default(0);
        });
        Schema::table('admanager', function (Blueprint $table) {
            $table->integer('ordering')->after('status')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms', function (Blueprint $table) {  
            $table->dropColumn('ordering');
        });

        Schema::table('slider', function (Blueprint $table) {  
            $table->dropColumn('ordering');
        });

        Schema::table('faq', function (Blueprint $table) {  
            $table->dropColumn('ordering');
        });

        Schema::table('admanager', function (Blueprint $table) {  
            $table->dropColumn('ordering');
        });
    }
}
