<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToColorSizeWiseQuantity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_size_wise_quantity', function (Blueprint $table) {
            $table->dateTime('deleted_at')->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_size_wise_quantity', function (Blueprint $table) {
             $table->dropColumn('deleted_at');
        });
    }
}
