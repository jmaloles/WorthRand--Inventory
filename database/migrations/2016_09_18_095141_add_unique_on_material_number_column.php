<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueOnMaterialNumberColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('after_markets', function(Blueprint $blueprint) {
            $blueprint->unique('material_number');
        });

        Schema::table('projects', function(Blueprint $blueprint) {
            $blueprint->unique('material_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('after_markets');
        Schema::drop('projects');
    }
}
