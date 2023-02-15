<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers =
        [
            [
                "offer_type" => "basic",
                "price" => 2.99,
                "duration" => 24
            ],
            [
                "offer_type" => "standard",
                "price" => 5.99,
                "duration" => 72
            ],
            [
                "offer_type" => "premium",
                "price" => 9.99,
                "duration" => 144
            ]
        ];

        foreach($offers as $offer){
            $new_offer = new Offer();
            $new_offer->offer_type = $offer['offer_type'];
            $new_offer->price = $offer['price'];
            $new_offer->duration = $offer['duration'];
            $new_offer->save();
        }
    }
}
