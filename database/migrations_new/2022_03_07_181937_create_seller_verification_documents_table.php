<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerVerificationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_verification_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_verification_document_setting_id');
            $table->string('document');
            $table->string('verification_status')->default('verified')->comment('pending,verified,cancelled,send_back');
            $table->string('send_back_massage')->nullable();
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
        Schema::dropIfExists('seller_verification_documents');
    }
}
