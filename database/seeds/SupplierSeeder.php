<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = collect([
            ["name" => "Arbres Fruitiers", "url" => "http://www.arbres-fruitiers.ca"],
            ["name" => "Pépinière Ancestrale", "url" => "http://www.pepiniereancestrale.com"],
            ["name" => "Cultiver l'abondance", "url" => "http://www.cultiverlabondance.com"],
            ["name" => "Horticulture Indigo", "url" => "http://www.horticulture-indigo.com"],
            ["name" => "Pépinière Casse-Noisette", "url" => "http://www.cassenoisettepepiniere.com"],
            ["name" => "Green Barn Nursery", "url" => "http://www.greenbarnnursery.ca"],
            ["name" => "Arboquebecium", "url" => "http://www.arboquebecium.com"],
            ["name" => "Pépinière Vert Forêt", "url" => "http://www.arbresenligne.com"],
            ["name" => "Jardin Jasmin", "url" => "http://www.jardinjasmin.com"],
            ["name" => "Jardin Deux-Montagne", "url" => "http://jardin2m.com"],
            ["name" => "Pépinière Saint-Nicolas", "url" => "http://www.psn3.com"],
            ["name" => "Pépinière Auclaire", "url" => "http://www.pepiniereauclairetfreres.com"],
        ]);

        $suppliers->each(function ($item) {
            Supplier::create($item);
        });
    }
}
