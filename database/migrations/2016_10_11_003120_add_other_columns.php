<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indented_proposals', function(Blueprint $table) {
            $table->string('purchase_order')->after('id');
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
            $table->dropColumn('purchase_order');
        });
    }
}
