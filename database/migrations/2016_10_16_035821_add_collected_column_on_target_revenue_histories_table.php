<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectedColumnOnTargetRevenueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_revenue_histories', function (Blueprint $table) {
            $table->decimal('collected', 19, 2);
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
            $table->dropColumn('collected');
        });
    }
}
