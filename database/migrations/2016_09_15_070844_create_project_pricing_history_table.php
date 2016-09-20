<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPricingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_pricing_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->date('pricing_date');
            $table->string('price');
            $table->string('terms');
            $table->string('delivery');
            $table->string('fpd_reference');
            $table->string('wpc_reference');
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
        Schema::drop('project_pricing_history');
    }
}
