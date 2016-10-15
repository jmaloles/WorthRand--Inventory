<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOnBuyAndSellProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy_and_sell_proposals', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('branch_id');
            $table->string('collection_status');
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
            $table->dropColumn('customer_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('collection_status');
        });
    }
}
