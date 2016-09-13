<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexFieldOnAllColumnsOnAfterMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('after_markets', function (Blueprint $table) {
            $table->index('name');
            $table->index('model');
            $table->index('part_number');
            $table->index('reference_number');
            $table->index('material_number');
            $table->index('serial_number');
            $table->index('tag_number');
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
            $table->dropIndex('name', 'model', 'part_number', 'reference_number', 'material_number', 'serial_number', 'tag_number');
        });
    }
}
