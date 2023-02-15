<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $new_review = new Review();
            $new_review->name = $faker->name();
            $new_review->text = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $doctor_id = Doctor::inRandomOrder()->first()->id;
            $new_review->doctor_id = $doctor_id;
            $new_review->save();
        }
    }
}
