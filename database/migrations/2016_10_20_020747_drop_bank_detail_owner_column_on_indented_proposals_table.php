<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBankDetailOwnerColumnOnIndentedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indented_proposals', function (Blueprint $table) {
            $table->dropColumn('bank_detail_owner');
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
            $table->string('bank_detail_owner');
        });
    }
}
