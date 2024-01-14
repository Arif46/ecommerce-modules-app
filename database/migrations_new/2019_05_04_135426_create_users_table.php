<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email',64)->unique()->nullable();
            $table->string('password',64)->nullable();
            $table->string('username',64)->unique()->nullable();
            $table->string('mobile_no',16)->unique()->nullable();
            $table->string('image',128)->nullable();            
            $table->unsignedInteger('roles_id')->nullable();
            $table->enum('type',array('super_admin','admin', 'customer', 'seller'))->nullable();
            $table->enum('seller_agreement',array('no','yes'))->nullable();
            $table->enum('status',array('active','inactive','cancel','pending'))->nullable();
            $table->string('remember_token',255)->nullable();

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
        Schema::dropIfExists('users');
    }
}
