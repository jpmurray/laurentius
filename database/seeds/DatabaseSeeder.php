<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(['name' => "JP Murray", "email" => "curieuxmurray@gmail.com", "password" => Illuminate\Support\Facades\Hash::make('secret')]);
        $this->call(TaxonomySeeder::class);
        $this->call(SpeciesTableSeeder::class);
        $this->call(SupplierSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
