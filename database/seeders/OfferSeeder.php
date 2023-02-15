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
        DB::table('offers')->insert([
            "offer_type" => "basic",
            "price" => 2.99,
            "duration" => 24
        ]);
        DB::table('offers')->insert([
            "offer_type" => "standard",
            "price" => 5.99,
            "duration" => 72
        ]);
        DB::table('offers')->insert([
            "offer_type" => "premium",
            "price" => 9.99,
            "duration" => 144
        ]);
    }
}
