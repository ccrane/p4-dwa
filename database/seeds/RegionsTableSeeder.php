<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            ['US', 'Washington', null],
            ['US', 'Columbia Gorge AVA', 'Washington'],
            ['US', 'Columbia Valley AVA', 'Washington'],
            ['US', 'Horse Heaven Hills AVA', 'Columbia Valley AVA'],
            ['US', 'Naches Heights AVA', 'Columbia Valley AVA'],
            ['US', 'Rattlesnake Hills AVA', 'Columbia Valley AVA'],
            ['US', 'Red Mountain AVA', 'Columbia Valley AVA'],
            ['US', 'Wahluke Slope AVA', 'Columbia Valley AVA'],
            ['US', 'Walla Walla Valley AVA', 'Columbia Valley AVA'],
            ['US', 'Yakima River', 'Columbia Valley AVA'],
            ['US', 'Puget Sound AVA', 'Washington'],
            ['US', 'Wisconsin', null],
            ['US', 'Niagara Escarpment', 'Wisconsin'],
        ];

        foreach ($regions as $region) {
            $country = Country::where('iso_code', '=', $region[0])->first();

            if($country) {
                $newRegion = new Region();
                $newRegion->name = $region[1];
                $newRegion->country_id = $country->id;

                if($region[2] != null) {
                    $parent = Region::where('name', '=', $region[2])->first();

                    if($parent) {
                        $newRegion->parent_id = $parent->id;
                    }
                }

                $newRegion->save();
            }
        }

    }
}
