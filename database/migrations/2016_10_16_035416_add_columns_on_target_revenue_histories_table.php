<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnTargetRevenueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_revenue_histories', function (Blueprint $table) {
            $table->string('proposal_type');
            $table->integer('proposal_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_revenue_histories', function (Blueprint $table) {
            $table->dropColumn('proposal_type');
            $table->dropColumn('proposal_id');
        });
    }
}
