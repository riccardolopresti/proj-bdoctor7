<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i=0; $i < 20; $i++) {


            $new_message = new Message();
            $new_message->name = $faker->name();
            $new_message->text = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $new_message->email = $faker->email();
            $doctor_id = Doctor::inRandomOrder()->first()->id;
            $new_message->doctor_id = $doctor_id;
            $new_message->save();
        }
    }
}
