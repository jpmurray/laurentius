<?php

use App\Classis;
use App\Divisio;
use App\Familia;
use App\Ordo;
use App\Regnum;
use Illuminate\Database\Seeder;

class TaxonomySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $kingdoms = collect([
            ["name" => "Archaea"],
            ["name" => "Bacteria"],
            ["name" => "Protozoa"],
            ["name" => "Chromista"],
            ["name" => "Plantae"], // id 5
            ["name" => "Fungi"],
            ["name" => "Animalia"],
        ]);

        $kingdoms->each(function ($item) {
            Regnum::create($item);
        });

        Regnum::find(5)->divisios()->create(['name' => 'Magnoliophyta']);
        Divisio::find(1)->classes()->create(['name' => 'Magnoliopsida']);
        Classis::find(1)->ordos()->create(['name' => 'Theales']);
        Ordo::find(1)->familias()->create(['name' => 'Actinidiaceae']);
        Familia::find(1)->genera()->create(['name' => 'Actinidia']);
    }
}
