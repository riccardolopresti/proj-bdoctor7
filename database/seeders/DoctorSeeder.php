<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users= User::all();

        foreach($users as $user){
            $new_doctor = new Doctor();
            $new_doctor->user_id=$user->id;
            $new_doctor->surname = $faker->lastName();
            $new_doctor->slug = Str::slug($user->name . '-' . $new_doctor->surname);
            $new_doctor->address = $faker->streetAddress();
            $new_doctor->image = 'https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';
            $new_doctor->phone = $faker->phoneNumber();
            $new_doctor->health_care = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $new_doctor->save();
        }
    }
}
