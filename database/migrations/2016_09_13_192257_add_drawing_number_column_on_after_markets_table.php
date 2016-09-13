<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDrawingNumberColumnOnAfterMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('after_markets', function (Blueprint $table) {
            $table->string('drawing_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('after_markets', function (Blueprint $table) {
            $table->dropColumn('drawing_number');
        });
    }
}
