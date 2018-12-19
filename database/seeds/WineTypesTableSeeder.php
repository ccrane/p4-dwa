<?php

use Illuminate\Database\Seeder;
use App\WineType;

class WineTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $winetypes = [
            'Red',
            'White',
            'Sparkling',
            'Rose',
            'Dessert',
            'Port'
        ];

        foreach ($winetypes as $winetype) {
            $newWineryType = new WineType();
            $newWineryType->name = $winetype;
            $newWineryType->save();
        }
    }
}
