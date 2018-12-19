<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Region;
use App\Winery;

class WineriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wineries = [
            ['US', 'Rattlesnake Hills AVA', 'Morrison Vineyard'],
            ['US', 'Horse Heaven Hills AVA', 'Columbia Crest Winery'],
            ['US', 'Horse Heaven Hills AVA', 'Alexandria Nicole Cellars'],
            ['US', 'Naches Heights AVA', 'Wilridge Vineyard'],
            ['US', 'Naches Heights AVA', 'Naches Heights Vineyard'],
            ['US', 'Naches Heights AVA', 'Strand Vineyard'],
            ['US', 'Naches Heights AVA', 'Aecetia Vineyard'],
            ['US', 'Naches Heights AVA', 'Harlequin Vineyard'],
            ['US', 'Naches Heights AVA', 'Keller Vineyard'],
            ['US', 'Naches Heights AVA', 'Kalkruth Vineyard'],
            ['US', 'Red Mountain AVA', 'Ciel du Cheval'],
            ['US', 'Red Mountain AVA', 'Cooper Estate Vineyard'],
            ['US', 'Red Mountain AVA', 'Klipsun'],
            ['US', 'Red Mountain AVA', 'Kiona Vineyards'],
        ];

        foreach ($wineries as $winery) {
            $country = Country::where('iso_code', '=', $winery[0])->first();
            $region = Region::where('name', '=', $winery[1])->first();

            if($country && $region) {
                $newWinery = new Winery();
                $newWinery->name = $winery[2];
                $newWinery->country_id = $country->id;
                $newWinery->region_id = $region->id;
                $newWinery->save();
            }
        }
    }
}
