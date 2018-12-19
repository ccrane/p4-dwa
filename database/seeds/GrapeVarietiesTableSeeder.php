<?php

use Illuminate\Database\Seeder;
use App\GrapeVariety;

class GrapeVarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grapeVarieties = [
            'Alvarinho',
            'Cabernet Sauvignon',
            'Chardonnay',
            'Gewürztraminer',
            'Grenache',
            'Grüner Veltliner',
            'Malbecr',
            'Merlot',
            'Pinot Grigio',
            'Pinot Noir',
            'Riesling',
            'Sauvignon Blanc',
            'Shiraz',
            'Tempranillo',
            'Viognier',
            'Sangiovese'
        ];

        foreach ($grapeVarieties as $variety) {
            $newVariety = new GrapeVariety();
            $newVariety->name = $variety;
            $newVariety->save();
        }
    }
}
