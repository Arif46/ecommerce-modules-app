<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->unique()->nullable();
            $table->string('slug',64)->unique()->nullable();
            $table->string('title_bn',64)->unique()->nullable();
            $table->string('title_hi',64)->unique()->nullable();
            $table->string('title_ch',64)->unique()->nullable();
            $table->float('percentage')->comment('Admin take sell commission by percentage');
            $table->text('note')->nullable();
            $table->text('note_bn')->nullable();
            $table->text('note_hi')->nullable();
            $table->text('note_ch')->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();
            $table->engine= 'InnoDB';
        });


        Schema::create('seller_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->string('slug',64)->unique()->nullable();
            $table->string('title_bn',64)->nullable();
            $table->string('title_hi',64)->unique()->nullable();
            $table->string('title_ch',64)->unique()->nullable();
            $table->unsignedInteger('commission_id')->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            $table->dateTimeTz('from_date')->nullable();
            $table->dateTimeTz('to_date')->nullable();
            $table->float('percentage')->comment('Get from commissions table by commission_id');
            $table->text('note',64)->nullable();
            $table->text('note_bn',64)->nullable();
            $table->text('note_hi')->nullable();
            $table->text('note_ch')->nullable();
            $table->enum('status',array(1,2))->comment('1 = Active','2 = inactive');
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();
            $table->engine= 'InnoDB';
        });       

        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedInteger('seller_commission_id')->nullable()->comment('Last active seller_commissions table id');            
            $table->foreign('seller_commission_id')->references('id')->on('seller_commissions');            
        });

        Schema::create('admin_seller_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('amount')->nullable();
            $table->enum('pay_by',array(1,2,3))->comment('1 = Cash','2 = Bank','3 = Mobile Bank');
            $table->text('special_instruction')->nullable();
            $table->string('admin_note')->nullable(); 
            $table->string('admin_note_bn')->nullable(); 
            $table->string('admin_note_hi')->nullable(); 
            $table->string('admin_note_ch')->nullable(); 
            $table->string('seller_note')->nullable(); 
            $table->string('seller_note_bn')->nullable(); 
            $table->string('seller_note_hi')->nullable(); 
            $table->string('seller_note_ch')->nullable(); 
            $table->string('received_copy')->nullable()->comment('document'); 
            $table->string('transaction_id')->nullable()->comment('Use for mobile transfar');
            $table->enum('approve_or_reject',array(1,2,3))->default(3)->comment('1 = approve','2 =reject','3 = pending');
            $table->string('approve_or_reject_note')->nullable();
            $table->string('approve_or_reject_note_bn')->nullable();
            $table->string('approve_or_reject_note_hi')->nullable();
            $table->string('approve_or_reject_note_ch')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->integer('created_by')->nullable()->comment('Admin id');
            $table->integer('updated_by')->nullable()->comment('User ID, who approved or reject');
            $table->timestamps();
            $table->softDeletes();
            $table->engine= 'InnoDB';
           
        });


        Schema::create('account_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id')->nullable();
            $table->float('total_sell_amount',8,2)->comment('Total sell ammount individual seller');
            $table->float('total_paid_amount',8,2)->comment('Total paid ammount individual seller');
            $table->float('total_commission_amount',8,2)->comment('Total commission ammount individual seller');
            $table->engine= 'InnoDB';

             $table->foreign('seller_id')->references('id')->on('users'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('seller_commissions');

        Schema::table('order_details', function (Blueprint $table) {  
            $table->dropForeign(['seller_commission_id']);
            $table->dropColumn('seller_commission_id');
        });
        Schema::dropIfExists('admin_seller_payments');
        Schema::dropIfExists('account_summaries');
    }
}
