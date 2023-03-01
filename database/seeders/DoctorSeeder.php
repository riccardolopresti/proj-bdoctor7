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
        $users = User::all();

        $health_care_services = [
            "Analisi del sangue",
            "Test di gravidanza",
            "Vaccinazioni",
            "Test delle allergie",
            "Visite di routine dal medico di base",
            "Controllo della glicemia",
            "Test dell'HIV",
            "Radiografie",
            "Ecografia",
            "Colonscopia",
            "Endoscopia",
            "Esami del sangue per la diagnosi del cancro",
            "Elettrocardiogramma (ECG)",
            "Esami del sangue per la diagnosi delle malattie cardiache",
            "Esame degli occhi",
            "Esame dell'udito",
            "Esame della vista",
            "Controllo del peso",
            "Controllo della funzionalità renale",
            "Test della funzionalità epatica",
            "Esame del tratto urinario",
            "Esame del sangue per la diagnosi delle malattie epatiche",
            "Test della funzionalità tiroidea",
            "Esame del sistema nervoso",
            "Esame delle funzioni polmonari",
            "Esame della funzione renale",
            "Esame della funzione cardiaca",
            "Esame delle funzioni digestive",
            "Esame della funzione muscolare",
            "Esame della funzione articolare",
            "Esame della funzione respiratoria",
            "Esame della funzione del sistema immunitario",
            "Esame della funzione del sistema endocrino",
            "Esame della funzione del sistema riproduttivo",
            "Esame delle funzioni cognitive",
            "Esame della funzione psicologica",
            "Esame delle funzioni emotive",
            "Esame delle funzioni sociali",
            "Esame delle funzioni spirituali",
            "Trattamento della depressione",
            "Trattamento dell'ansia",
            "Trattamento della schizofrenia",
            "Trattamento del disturbo bipolare",
            "Trattamento dei disturbi del sonno",
            "Trattamento dell'asma",
            "Trattamento del diabete",
            "Trattamento dell'ipertensione",
            "Trattamento delle malattie cardiache",
            "Trattamento del cancro"
        ];

        foreach ($users as $user) {
            $new_doctor = new Doctor();
            $new_doctor->user_id = $user->id;
            $new_doctor->surname = $faker->lastName();
            $new_doctor->slug = Str::slug($user->name . '-' . $new_doctor->surname);
            $new_doctor->address = $faker->streetAddress();
            $new_doctor->image = 'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png';
            $new_doctor->phone = $faker->phoneNumber();
            $new_doctor->health_care = $health_care_services[array_rand(array_values($health_care_services))];
            $new_doctor->save();
        }
    }
}
