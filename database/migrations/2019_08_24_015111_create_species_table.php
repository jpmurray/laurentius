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
            $table->string('hardiness_ca')->default('unknown');
            $table->json('sun')->nullable();
            $table->string('water')->default('unknown');
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
            $table->json('interesting_cultivar')->nullable();
            $table->longText('maintainers_note')->nullable();
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
