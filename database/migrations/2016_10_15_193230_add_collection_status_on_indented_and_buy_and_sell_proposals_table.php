<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectionStatusOnIndentedAndBuyAndSellProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indented_proposals', function(Blueprint $table) {
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
        Schema::table('indented_proposals', function(Blueprint $table) {
            $table->dropColumn('branch_id');
            $table->dropColumn('collection_status');
        });
    }
}
