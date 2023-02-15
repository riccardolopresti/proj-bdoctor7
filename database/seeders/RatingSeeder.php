<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 40; $i++) {
            $new_rating = new Rating();
            $new_rating->name = $faker->name();
            $random_numb = $faker->randomFloat(1, 0, 5);
            $new_rating->rating = round($random_numb / 0.5) * 0.5;
            $new_rating->save();
        }
    }
}
