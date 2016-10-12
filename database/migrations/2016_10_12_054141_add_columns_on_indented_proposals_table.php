<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnIndentedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indented_proposals', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->integer('collection_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indented_proposals', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            $table->dropColumn('user_id');
            $table->dropColumn('collection_id');
        });
    }
}
