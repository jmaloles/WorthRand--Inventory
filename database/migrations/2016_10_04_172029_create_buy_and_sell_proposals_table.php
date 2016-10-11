<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyAndSellProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_and_sell_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('quantity');
            $table->decimal('price',19,2);
            $table->string('delivery');
            $table->string('wpc_reference');
            $table->integer('date');
            $table->string('sold_to');
            $table->string('to');
            $table->string('invoice_to');
            $table->string('qrc_ref');
            $table->string('validity');
            $table->string('payment_terms');
            $table->timestamps();
            $table->softDeletes();
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buy_and_sell_proposals');
    }
}
