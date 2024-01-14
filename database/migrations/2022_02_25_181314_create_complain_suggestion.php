<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainSuggestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_suggestion', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->string('mail')->nullable();
            $table->string('phone_no')->nullable();
            $table->longText('com_sugg_desc')->nullable()->comment('complain or suggestion description from seller or customer');
            $table->enum('admin_status',array(1,2,3))->default(1)->comment('1 = Unread ,2 = Readed, 3 = Given Answer');
            $table->enum('user_status',array(1,2))->default(1)->comment('1 = Unread ,2 = Readed');
            $table->enum('created_from',array(1,2,3))->comment('1 = Admin ,2 = Seller, 3 =Customer');
            $table->enum('notice_for_all', ['yes','no'])->default('no');
            $table->unsignedInteger('created_for')->nullable()->comment('User_id only use for seller message from admin');
            $table->unsignedInteger('created_by')->nullable()->comment('User Id');
            $table->unsignedInteger('deleted_by')->nullable()->comment('User Id');
            
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';

            $table->foreign('created_for')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complain_suggestion');
    }
}
