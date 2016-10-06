<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_revenues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('target_sale', 19, 2);
            $table->decimal('current_sale', 19, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_revenues', function (Blueprint $table) {
            //
        });
    }
}
