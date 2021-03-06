<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterMarketPricingHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_market_pricing_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('after_market_id');
            $table->string('po_number');
            $table->date('pricing_date');
            $table->string('price');
            $table->string('terms');
            $table->string('delivery');
            $table->string('fpd_reference');
            $table->string('wpc_reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('after_market_pricing_histories');
    }
}
