<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpeciesTable56 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->enum('hardiness_ca', ['0', '0a', '0b', '1', '1a', '1b', '2', '2a', '2b', '3', '3a', '3b', '4', '4a', '4b', '5', '5a', '5b', '6', '6a', '6b', '7', '7a', '7b', '8', '8a', '8b', '9', '9a', '9b'])->nullable();
            $table->json('sun')->nullable();
            $table->enum('water', [1, 2, 3, 4, 5])->nullable();
            $table->json('soil')->nullable();
            $table->float('ph_min', 3, 1)->nullable();
            $table->float('ph_max', 3, 1)->nullable();
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
            $table->dropColumn(['hardiness_ca', 'sun', 'water', 'soil', 'ph_min', 'ph_max']);
        });
    }
}
