<?php

use App\Regnum;
use Illuminate\Database\Seeder;

class RegnumTableSeeder extends Seeder
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
            ["name" => "Plantae"],
            ["name" => "Fungi"],
            ["name" => "Animalia"],
        ]);

        $kingdoms->each(function ($item) {
            Regnum::create($item);
        });
    }
}
