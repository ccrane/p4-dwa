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
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(WineriesTableSeeder::class);
        $this->call(WineTypesTableSeeder::class);
        $this->call(GrapeVarietiesTableSeeder::class);
        $this->call(WinesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
