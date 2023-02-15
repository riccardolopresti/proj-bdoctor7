<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DoctorOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();

        $data = array('today','yesterday','-2 Days','-4 Days');

        foreach($doctors as $doctor){
            $random_numb = rand(0,2);
            $random_data = $data[array_rand($data,1)];

            for ($i=0; $i < $random_numb ; $i++) {
                $offer_id = Offer::inRandomOrder()->first();

                $start_str = strtotime($random_data);

                $start_at = date("Y-m-d h:i:s", $start_str);

                $end_str = $start_str + (($offer_id->duration) * 3600);

                $end_at = date("Y-m-d h:i:s", $end_str);

                $doctor->offers()->attach($offer_id,
                    [
                        "start_at" => $start_at,
                        "end_at" => $end_at,
                    ]
                );
            }
        }
    }
}
