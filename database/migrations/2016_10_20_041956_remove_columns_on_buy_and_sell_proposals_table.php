<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsOnBuyAndSellProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy_and_sell_proposals', function (Blueprint $table) {
            $table->dropColumn('sold_to');
            $table->dropColumn('to');
            $table->dropColumn('sold_to_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buy_and_sell_proposals', function (Blueprint $table) {
            $table->string('sold_to');
            $table->string('to');
            $table->string('sold_to_address');
        });
    }
}
