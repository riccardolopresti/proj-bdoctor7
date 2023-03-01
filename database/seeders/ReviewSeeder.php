<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $reviews = [
            "Un medico molto competente e affidabile. Ha dimostrato una grande attenzione alle mie preoccupazioni e ha risposto con pazienza e chiarezza a tutte le mie domande.",
            "Ha dimostrato una grande empatia nei confronti dei miei problemi di salute e ha lavorato con me per trovare la soluzione migliore per il mio caso specifico.",
            "Ho avuto il piacere di lavorare con il dottor per un problema di salute cronico. Ha dimostrato una grande conoscenza e competenza e ha fatto un lavoro eccezionale nel gestire il mio caso.",
            "Molto attenta e professionale. Ha sempre mantenuto una comunicazione aperta e sincera, garantendo la mia comprensione di ogni passaggio del processo di diagnosi e cura.",
            "Molto competente e conosce molto bene la sua specializzazione. Mi ha fatto sentire a mio agio durante ogni appuntamento e ha spiegato ogni dettaglio del mio piano di cura.",
            "Molto gentile e ha dimostrato una grande cura nei confronti dei suoi pazienti. Ha fatto un lavoro eccezionale nel gestire la mia patologia e nel farmi sentire a mio agio durante ogni visita.",
            "Ha dimostrato una grande competenza e ha lavorato con me per trovare la soluzione migliore per il mio problema di salute. Ha sempre mantenuto una comunicazione aperta e sincera, assicurandomi di comprendere ogni passaggio del processo di diagnosi e cura.",
            "Mmolto paziente e comprensiva. Ha fatto un lavoro eccezionale nel gestire il mio problema di salute e mi ha aiutato a superare le mie preoccupazioni.",
            "Professionale e ha dimostrato una grande attenzione ai dettagli. Ha lavorato con me per trovare la soluzione migliore per il mio caso specifico e ha fatto un lavoro eccezionale nel gestire il mio problema di salute.",
            "Competente e ha dimostrato una grande attenzione ai dettagli. Ha sempre mantenuto una comunicazione aperta e sincera, assicurandosi che io comprendessi ogni passaggio del processo di diagnosi e cura.",
            "Professionale e conosce molto bene la sua specializzazione. Ha fatto un lavoro eccezionale nel gestire il mio problema di salute e mi ha aiutato a trovare la soluzione migliore per me.",
            "Attenta e professionale. Ha dimostrato una grande empatia nei confronti dei miei problemi di salute e ha lavorato con me per trovare la soluzione migliore per il mio caso specifico.",
            "Molto attento e competente. Ha sempre mantenuto una comunicazione aperta e sincera e ha lavorato con me per trovare la soluzione migliore per il mio problema di salute.",
            "Competente e professionale. Ha fatto un lavoro eccezionale nel gestire il mio problema",
            "Medico molto professionale e gentile. Ha saputo risolvere il mio problema di salute in modo rapido ed efficace.",  "Molto attenta alle esigenze dei suoi pazienti. Ha fatto tutto il possibile per aiutarmi a guarire.",  "Molto competente nel suo campo. Ha saputo diagnosticare il mio problema in modo accurato e fornirmi le cure necessarie.",  "Gialli è una medico molto competente e professionale. Ha sempre risposto alle mie domande con pazienza e gentilezza.",  "Molto disponibile e attento alle necessità dei suoi pazienti. Ha fornito un'ottima assistenza durante tutto il mio periodo di guarigione.",  "Medico molto competente e professionale. Ha saputo diagnosticare e curare il mio problema di salute in modo rapido ed efficace.",  "Molto preciso e attento durante le visite mediche. Ha saputo risolvere il mio problema in modo efficiente.",  "Molto attenta e premurosa. Ha sempre fornito un'ottima assistenza durante il mio periodo di guarigione.",  "Competente e professionale. Ha saputo diagnosticare e curare il mio problema di salute in modo rapido ed efficace.",  "Gentile e disponibile. Ha sempre fornito risposte esaustive alle mie domande.",  "Bravo nel suo campo. Ha saputo fornire un'ottima assistenza durante tutto il mio periodo di guarigione.",  "Premurosa. Ha saputo curare il mio problema di salute in modo rapido ed efficace.",  "Professionale e competente. Ha saputo fornire una diagnosi precisa e le cure necessarie per la mia guarigione.",  "Medico molto attenta e competente. Ha sempre fornito risposte esaurienti alle mie domande.",  "Medico molto preciso e attento. Ha saputo risolvere il mio problema di salute in modo efficiente.",  "Molto competente nel suo campo. Ha saputo fornire un'ottima assistenza durante tutto il mio periodo di guarigione.",  "Molto attento e premuroso. Ha saputo curare il mio problema di salute in modo rapido ed efficace.",  "Molto gentile e disponibile. Ha sempre fornito risposte esaustive alle mie domande.",  "Professionale e competente. Ha saputo fornire una diagnosi precisa e le cure necessarie per la mia guarigione.",  "Molto attenta e premurosa. Ha saputo curare il mio problema di salute in modo rapido ed efficace."
        ];

        for ($i=0; $i < 1000; $i++) {
            $new_review = new Review();
            $new_review->name = $faker->name();
            $new_review->text = $reviews[array_rand(array_values($reviews))];
            $doctor_id = Doctor::inRandomOrder()->first()->id;
            $new_review->doctor_id = $doctor_id;
            $new_review->save();
        }
    }
}
