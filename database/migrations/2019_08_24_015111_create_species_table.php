<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('genus_id');
            $table->string("name");
            $table->string("name_en");
            $table->string("name_fr");
            $table->enum('hardiness_ca', ['0', '0a', '0b', '1', '1a', '1b', '2', '2a', '2b', '3', '3a', '3b', '4', '4a', '4b', '5', '5a', '5b', '6', '6a', '6b', '7', '7a', '7b', '8', '8a', '8b', '9', '9a', '9b'])->nullable();
            $table->json('sun')->nullable();
            $table->enum('water', [1, 2, 3, 4, 5])->nullable();
            $table->json('soil')->nullable();
            $table->float('ph_min', 3, 1)->nullable();
            $table->float('ph_max', 3, 1)->nullable();
            $table->json('shape')->nullable();
            $table->json('root')->nullable();
            $table->float('maturity_height_meters', 4, 2)->nullable();
            $table->float('maturity_width_meters', 4, 2)->nullable();
            $table->boolean('nitrogen_fixer')->default(false);
            $table->boolean('nutrient_accumulator')->default(false);
            $table->boolean('ground_cover')->default(false);
            $table->boolean('hedge')->default(false);
            $table->json('wildlife_use')->nullable();
            $table->json('ecological_use')->nullable();
            $table->json('pollinating_type')->nullable();
            $table->boolean('medicinal_use')->default(false);
            $table->json('comestible_use')->nullable();
            $table->json('flowering_period')->nullable();
            $table->json('flowering_color')->nullable();
            $table->json('foliage_color')->nullable();
            $table->json('post_summer_appeal')->nullable();
            $table->json('growth')->nullable();
            $table->json('pruning_period')->nullable();
            $table->json('multiplication')->nullable();
            $table->json('disadvantages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
