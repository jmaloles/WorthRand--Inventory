<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePricingDateDataFiledToInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_pricing_histories', function (Blueprint $table) {
            $table->integer('pricing_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_pricing_histories', function (Blueprint $table) {
            $table->date('pricing_date')->change();
        });
    }
}
