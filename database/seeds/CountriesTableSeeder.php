<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['Canada', 'CA'],
            ['United States', 'US']
        ];

        foreach($countries as $country) {
            $c = new Country();

            $c->name = $country[0];
            $c->iso_code = $country[1];

            $c->save();
        }
    }
}
