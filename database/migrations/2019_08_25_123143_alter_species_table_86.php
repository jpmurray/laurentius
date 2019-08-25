<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpeciesTable86 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->json('flowering_period')->nullable();
            $table->json('flowering_color')->nullable();
            $table->json('foliage_color')->nullable();
            $table->json('post_summer_appeal')->nullable();
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
            $table->dropColumn(['flowering_period', 'flowering_color', 'foliage_color', 'post_summer_appeal']);
        });
    }
}
