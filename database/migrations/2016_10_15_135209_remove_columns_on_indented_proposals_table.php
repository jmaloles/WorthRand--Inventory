<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsOnIndentedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indented_proposals', function (Blueprint $table) {
            $table->dropColumn('collection_id');
            $table->dropColumn('to_address');
            $table->dropColumn('sold_to_address');
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
            $table->integer('collection_id');
            $table->string('to_address');
            $table->string('sold_to_address');
        });
    }
}
