<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpeciesTable11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->boolean('nitrogen_fixer')->default(false);
            $table->boolean('nutrient_accumulator')->default(false);
            $table->boolean('ground_cover')->default(false);
            $table->boolean('hedge')->default(false);
            $table->json('wildlife_use')->nullable();
            $table->json('ecological_use')->nullable();
            $table->json('pollinating_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->dropColumn(['nitrogen_fixer', 'nutrient_accumulator', 'ground_cover', 'hedge', 'wildlife_use', 'ecological_use', 'pollinating_type']);
        });
    }
}
