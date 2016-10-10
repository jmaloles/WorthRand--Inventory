<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyAndSellProposalItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_and_sell_proposal_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buy_and_sell_proposal_id');
            $table->integer('item_id');
            $table->integer('quantity');
            $table->decimal('price',19,2);
            $table->string('delivery');
            $table->string('type');
            $table->string('status');
            $table->softDeletes();
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
        Schema::drop('buy_and_sell_proposal_item');
    }
}
