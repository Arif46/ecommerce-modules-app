<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerVerificationDocumentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_verification_document_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('document_type')->comment('comma separated document type like: jpg,png,pdf')->default('pdf');
            $table->string('size_in_kb')->comment('document size in kb')->nullable();
            $table->string('required')->default('required')->comment('required|optional');
            $table->string('display')->default('required')->comment('required|hide');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('seller_verification_document_settings');
    }
}
