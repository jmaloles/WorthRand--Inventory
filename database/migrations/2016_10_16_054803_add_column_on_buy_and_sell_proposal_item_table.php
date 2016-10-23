<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOnBuyAndSellProposalItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy_and_sell_proposal_item', function (Blueprint $table) {
            $table->string('notify_me_after');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buy_and_sell_proposal_item', function (Blueprint $table) {
            $table->dropColumn('notify_me_after');
        });
    }
}
