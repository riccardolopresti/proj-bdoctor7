<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Spec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSpecSeeder extends Seeder
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
            $random_numb = rand(1,3);

            for ($i=0; $i < $random_numb ; $i++) {
                $spec_id = Spec::inRandomOrder()->first();

                if(!($doctor->specs->contains($spec_id))){
                    $doctor->specs()->syncWithoutDetaching($spec_id);
                }
            }

        }
    }
}
