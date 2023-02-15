<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            DoctorSeeder::class,
            SpecSeeder::class,
            OfferSeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
            RatingSeeder::class,
            DoctorSpecSeeder::class,
            DoctorRatingSeeder::class,
            DoctorOfferSeeder::class,
        ]);
    }
}
