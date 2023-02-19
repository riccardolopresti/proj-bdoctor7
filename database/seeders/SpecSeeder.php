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
        $types = ['Cardiologia','Dermatologia',
        'Fisioterapia',
        'Geriatria',
        'Ginecologia',
        'Medicina dello Sport','Oculistica',
        'Osteopatia','Podologia',
        'Psicologia',  'Reumatologia', 'Urologia'];

        foreach($types as $type){
            $new_spec = new Spec();
            $new_spec->type = $type;
            $new_spec->save();
        }
    }
}
