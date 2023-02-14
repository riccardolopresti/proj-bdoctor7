<?php

namespace Database\Seeders;

use App\Models\Spec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Dermatologia', 'Oculistica', 'Podologia', 'Fisioterapia', 'Osteopatia', 'Reumatologia', 'Geriatria', 'Medicina dello Sport', 'Cardiologia', 'Ginecologia', 'Urologia'];

        foreach($types as $type){
            $new_spec = new Spec();
            $new_spec->type = $type;
            $new_spec->save();
        }
    }
}
