<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to');
            $table->integer('sold_to');
            $table->string('invoice_to');
            $table->string('ship_to');
            $table->string('wpcoc');
            $table->string('order_entry_no');
            $table->string('ship_via');
            $table->string('amount');
            $table->string('insurance');
            $table->string('bank_details');
            $table->string('documents');
            $table->string('special_instructions');
            $table->string('packing');
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
        Schema::drop('proposals');
    }
}
