<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Region;
use App\Winery;
use App\Wine;
use App\WineType;
use App\GrapeVariety;

class WinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $wines = [
            ['US', 'Rattlesnake Hills AVA', 'Morrison Vineyard', 'Rattlesnake Hills Chardonnay', 'White', 'Chardonnay', 2017, 20.00, 'Barrel-fermented and aged in new French oak barrels. Soft, luscious, and buttery.', 'http://media.gettyimages.com/photos/red-wine-bottle-isolated-on-white-background-picture-id847117018?s=170667a&w=1007'],
            ['US', 'Rattlesnake Hills AVA', 'Morrison Vineyard', 'Rattlesnake Hills Merlot', 'Red', 'Merlot', 2014, 20.00, 'Big bright red cherry nose with layers of sweet oak from 100% new French oak barrels. Very limited.', 'http://media.gettyimages.com/photos/red-wine-bottle-isolated-on-white-background-picture-id847117018?s=170667a&w=1007'],
            ['US', 'Horse Heaven Hills AVA', 'Columbia Crest Winery', 'Cabernet Sauvignon - Special Anniversary Bottling', 'Red', 'Cabernet Sauvignon', 2015, 50.00, 'Cabernet Sauvignon is a standout variety from Washington, with silky tannins, rich complexity and concentrated fruit. That’s why our Columbia Valley Cabernet is the perfect choice to carry the nostalgic banner of our 50th anniversary. Raise a glass and help us celebrate the next 50 years!', 'https://assets.wine/files/brands_cms/BottleShot/2234/CSM_btl_TB_cv_cb-1400_store_medium.png'],
            ['US', 'Red Mountain AVA', 'Kiona Vineyards', 'Estate Red Mountain Cabernet Sauvignon', 'Red', 'Cabernet Sauvignon', 2014, 75.00, 'Fine grain tannin, great fruit, and dark color abound. High-end components from our esteemed Heart of the Hill estate vineyard add depth, complexity, and layered intrigue.', 'https://storage.googleapis.com/cdn.vinoshipper.com/wine/13233/dff5d18c-a57c-4803-a8f4-85a2ab57f7a5.jpg'],
            ['US', 'Red Mountain AVA', 'Kiona Vineyards', 'Estate Red Mountain Sangiovese', 'Red', 'Sangiovese', 2014, 30.00, 'Racy and bright, with vibrant red fruit and trademark minerality. Its ample acidity makes it a food-pairing superstar, able to complement a wide array of cuisines from around the world.', 'https://storage.googleapis.com/cdn.vinoshipper.com/wine/13571/0e066689-f2b6-49e3-81d2-9c4ff6b06cc1.jpg'],
        ];

        foreach ($wines as $wine) {
            $country = Country::where('iso_code', '=', $wine[0])->first();
            $region = Region::where('name', '=', $wine[1])->first();
            $winery = Winery::where('name', '=', $wine[2])->first();
            $type = WineType::where('name', '=', $wine[4])->first();
            $variety = GrapeVariety::where('name', '=', $wine[5])->first();

            if ($country && $region && $winery && $type && $variety) {
                $newWine = new Wine();

                $newWine->country_id = $country->id;
                $newWine->region_id = $region->id;
                $newWine->winery_id = $winery->id;
                $newWine->type_id = $type->id;
                $newWine->variety_id = $variety->id;
                $newWine->name = $wine[3];
                $newWine->vintage = $wine[6];
                $newWine->price = $wine[7];
                $newWine->description = $wine[8];
                $newWine->bottle_image_url = $wine[9];

                $newWine->save();
            }
        }
    }
}
