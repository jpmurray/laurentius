<?php

use App\Classis;
use App\Divisio;
use App\Familia;
use App\Genus;
use App\Ordo;
use App\Regnum;
use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genus::find(1)->species()->create([
            'name' => 'Kolomikta',
            'name_fr' => 'Kiwi arctique',
            'name_en' => 'Superhardy kiwifruit',
            'hardiness_ca' => '3',
            'sun' => ['full', 'partial'],
            'soil' => ['medium', 'heavy'],
            'water' => 5,
            'ph_min' => 5,
            'ph_max' => 8,
            'shape' => ['vine'],
            'root' => ['superficial'],
            'maturity_width_meters' => 4,
            'maturity_height_meters' => 4,
            'nitrogen_fixer' => false,
            'nutrient_accumulator' => false,
            'wildlife_use' => ['none'],
            'pollinating_type' => ['none'],
            'ecological_use' => ['none'],
            'ground_cover' => false,
            'hedge' => false,
            'comestible_use' => ['fruit'],
            'medicinal_use' => true,
            'flowering_period' => ['spring'],
            'flowering_color' => ['white'],
            'foliage_color' => ['green'],
            'post_summer_appeal' => ['none'],
            'growth' => ['fast'],
            'pruning_period' => ['none'],
            'multiplication' => ['cuttings (spring)'],
            'disadvantages' => ['expansive']
        ]);
    }
}
