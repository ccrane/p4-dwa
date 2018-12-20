<?php

use Illuminate\Database\Seeder;
use App\Review;
use App\User;
use App\Wine;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            ['Rattlesnake Hills Chardonnay', 'jill@harvard.edu', 'Nice nose. Slight fruit up front. Very tasty. Full body. Dry finish.', 4.5],
            ['Rattlesnake Hills Merlot', 'jill@harvard.edu', 'Really nice wine for the price. Nice aroma that is reminiscent of a cab sav. Quite smooth, with a surprisingly lengthy finish. Alcohol level tastes in the higher side. Flavor is really quite nice. Would definitely drink again.', 3.9],
            ['Cabernet Sauvignon - Special Anniversary Bottling', 'jill@harvard.edu', 'Slightly muted nose, with herbaceous notes. Dark leather, dark fruits, earth, and summer grasses. Opens well. Huge, but well integrated tannins. Will age well.', 4.0],
            ['Estate Red Mountain Cabernet Sauvignon', 'jill@harvard.edu', 'Deep dark blood red opaque. Very attractive black fruit and perfumed notes on the nose with subtle delicate mint silky fine velvety tannins', 4.5],
            ['Estate Red Mountain Sangiovese', 'jill@harvard.edu', 'Very tasty. Off dry with hints of melon, strawberry, and a little Myer lemon.', 4.2],

            ['Rattlesnake Hills Chardonnay', 'jamal@harvard.edu', 'Exceptional Collio depth with plums a bit of acidity and a round long finish', 4.0],
            ['Rattlesnake Hills Merlot', 'jamal@harvard.edu', 'Decanted for over an hour and was rewarded with elegant flavours of blackberry, dark cherry, blueberry, plum, and loads of vanilla. Just the right amount of oak.', 3.9],
            ['Cabernet Sauvignon - Special Anniversary Bottling', 'jamal@harvard.edu', 'Wow! Strawberry nose. Great legs! Then this chewy big red. Leather and chocolate...Yummy! Crack this one open to impress', 4.5],
            ['Estate Red Mountain Cabernet Sauvignon', 'jamal@harvard.edu', 'This wine really needs airing and time. At first not much flavors and really tannic as one would expect of a Super Tuscan. The tannins are strong and quite bitter. Really lacks pleasant flavors for my personal taste. However after about a 30 min airing the fruits start showing up in the nose and a little in the body. Sour and dark cherries and maybe blackberries in the body', 3.5],
            ['Estate Red Mountain Sangiovese', 'jamal@harvard.edu', 'Very crisp with a great grapefruit notes.', 4.0],
        ];

        foreach ($reviews as $review) {
            $wine = Wine::where('name', '=', $review[0])->first();
            $user = User::where('email', '=', $review[1])->first();

            if ($wine && $user) {
                $newReview = new Review();

                $newReview->wine_id = $wine->id;
                $newReview->user_id = $user->id;
                $newReview->comment = $review[2];
                $newReview->rating = $review[3];

                $newReview->save();
            }
        }
    }
}
