<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpeciesTable36 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->json('shape')->nullable();
            $table->json('root')->nullable();
            $table->float('maturity_height_meters', 4, 2)->nullable();
            $table->float('maturity_width_meters', 4, 2)->nullable();
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
            $table->dropColumn(['shape', 'root', 'maturity_height_meters', 'maturity_width_meters']);
        });
    }
}
