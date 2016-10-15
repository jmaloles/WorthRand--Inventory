<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMaterialCodeColumnOnSealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seals', function (Blueprint $table) {
            $table->renameColumn('material_code', 'material_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seals', function (Blueprint $table) {
            $table->renameColumn('material_number', 'material_code');
        });
    }
}
