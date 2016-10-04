<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsOnBuyAndSellProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy_and_sell_proposals', function(Blueprint $table) {
            $table->dropColumn('item_id');
            $table->dropColumn('quantity');
            $table->dropColumn('price');
            $table->dropColumn('delivery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buy_and_sell_proposals', function(Blueprint $table) {
            $table->integer('item_id');
            $table->integer('quantity');
            $table->decimal('price',19,2);
            $table->string('delivery');
        });

    }
}
