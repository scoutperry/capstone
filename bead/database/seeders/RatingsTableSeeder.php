<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Rating; # Make our Rating Model accessible
use Faker\Factory; # We’ll use this library to generate random/fake data

class RatingsTableSeeder extends Seeder
{
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                # https://fakerphp.github.io
                $this->faker = Factory::create();

                $this->addAllRatingsFromRatingsDotJsonFile();

    }

    private function addAllRatingsFromRatingsDotJsonFile()
    {
        $ratingData = file_get_contents(database_path('ratings.json'));
        $ratings = json_decode($ratingData, true);

        foreach ($ratings as $slug => $ratingData) {
            $rating = new rating();

            $rating->created_at = $this->faker->dateTimeThisMonth();
            $rating->updated_at = $rating->created_at;
            $rating->measure = $ratingData['measure'];
            $rating->handle = $slug;
            $rating->active = $ratingData['active'];
            $rating->department_id = $ratingData['department_id'];

            $rating->save();
        }
    }
}
