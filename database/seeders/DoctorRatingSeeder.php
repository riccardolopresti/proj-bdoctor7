<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();

        foreach($doctors as $doctor){
            $random_numb = rand(1,6);
            for ($i=0; $i < $random_numb ; $i++) {
                $rating_id = Rating::inRandomOrder()->first();

                $doctor->ratings()->attach($rating_id);
            }
        }
    }
}
