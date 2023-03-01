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
        $messages = [
            'Salve dottore, ho bisogno di qualche consiglio sulla mia salute.',
            'Buongiorno dottore, ho notato alcuni sintomi preoccupanti e vorrei avere il suo parere.',
            'Ciao dottore, mi consiglia di fare un controllo medico generale?',
            'Dottore, potrebbe dirmi quale specialista dovrei consultare per il mio problema di salute?',
            'Buonasera dottore, ho bisogno di una prescrizione medica, come posso fare?',
            'Dottore, potrebbe darmi qualche consiglio per gestire il mio dolore cronico?',
            'Salve dottore, ho qualche dubbio sulla terapia farmacologica che sto seguendo, potrebbe aiutarmi?',
            'Buongiorno dottore, vorrei sapere quali sono i possibili effetti collaterali del farmaco che sto assumendo.',
            'Ciao dottore, mi potrebbe dire se è possibile sostituire il farmaco che sto prendendo con uno generico?',
            'Dottore, ho bisogno di sapere quale esame devo fare per capire la causa dei miei sintomi.',
            'Buonasera dottore, ho avuto un infezione e vorrei sapere quale antibiotico dovrei prendere.',
            'Dottore, ho avuto una reazione allergica al farmaco prescritto, cosa devo fare?',
            'Salve dottore, ho bisogno di sapere come gestire ansia e stress.',
            'Buongiorno dottore, ho problemi di sonno e vorrei sapere se ci sono rimedi naturali efficaci.',
            'Ciao dottore, ho dei disturbi alimentari e vorrei sapere a chi dovrei rivolgermi per un aiuto.',
            'Dottore, mi potrebbe consigliare una dieta equilibrata per il mio stato di salute attuale?',
            'Buonasera dottore, ho dei problemi di pressione sanguigna, come posso gestirli?',
            'Dottore, ho dei problemi di vista e vorrei sapere se è necessario fare degli esami specifici.',
            'Salve dottore, ho bisogno di informazioni sulle vaccinazioni obbligatorie e consigliate per la mia età.',
           'Buongiorno dottore, mi potrebbe dire se devo interrompere la terapia farmacologica prima di un intervento chirurgico?',
           'Ciao dottore, ho bisogno di informazioni sulle possibili complicazioni di un intervento chirurgico che devo affrontare.',
           'Dottore, mi potrebbe dire quali sono le possibili cause del mio mal di testa persistente?',
           'Buonasera dottore, ho dei problemi di digestione, cosa potrei fare per migliorare?',
           'Dottore, mi potrebbe consigliare una terapia alternativa per il mio problema di salute?',
           'Salve dottore, ho bisogno di sapere come posso prevenire le malattie cardiache.',
           'Buongiorno dottore, ho dei dubbi sulle terapie complementari e vorrei sapere se possono essere efficaci per il mio caso.',
           'Buongiorno dottore, ho bisogno di fissare un appuntamento per una visita.',
           'Buongiorno dottore, mi sento stanco e debilitato, potrebbe essere utile fare degli esami del sangue?',
           'Buongiorno dottore, ho notato un irritazione sulla pelle, potrebbe prescrivermi una crema?',
           'Buongiorno dottore, vorrei parlare con lei di un problema di ansia che mi affligge da tempo.',
           'Buongiorno dottore, mi sono infortunato alla caviglia, dovrei fare una radiografia?',
           'Buongiorno dottore, soffro di mal di testa costante, potrebbe aiutarmi a capire le cause?',
           'Buongiorno dottore, ho bisogno di un certificato medico per motivi di lavoro, potrebbe fornirmelo?',
           'Buongiorno dottore, ho difficoltà a dormire, potrebbe suggerirmi qualche rimedio naturale?',
           'Buongiorno dottore, ho notato una macchia strana sul un occhio, potrebbe essere utile una visita oculistica?',
           'Buongiorno dottore, vorrei effettuare un controllo, potrebbe fissare un appuntamento?',
           'Buongiorno dottore, mi sento ansioso e stressato, potrebbe prescrivermi qualcosa per aiutarmi a rilassarmi?',
           'Buongiorno dottore, soffro di dolori alla schiena, potrebbe suggerirmi degli esercizi per alleviare la tensione muscolare?',
           'Buongiorno dottore, ho notato una perdita di peso improvvisa, potrebbe esserci una causa medica?',
           'Buongiorno dottore, ho avuto una febbre alta per diversi giorni, dovrei fare degli esami del sangue?',
           'Buongiorno dottore, ho bisogno di un rinnovo della prescrizione del mio farmaco, potrebbe inviarla alla farmacia?',
           'Buongiorno dottore, ho un problema di intolleranza al glutine, potrebbe aiutarmi a scegliere una dieta adeguata?',
           'Buongiorno dottore, vorrei sottopormi a una visita cardiologica per prevenzione, potrebbe consigliarmi un esperto?',
          'Buongiorno dottore, mi sento molto affaticato, potrebbe prescrivermi una cura per aumentare le energie?',
          'Buongiorno dottore, ho bisogno di una visita odontoiatrica, potrebbe suggerirmi un professionista?',
          'Buongiorno dottore, vorrei effettuare una visita di controllo, potrebbe fissare un appuntamento?',
          'Buonasera dottore, ho notato un dolore alla gola persistente, potrebbe essere utile una visita otorinolaringoiatrica?',
          'Buonasera dottore, soffro di problemi di digestione, potrebbe suggerirmi una dieta adeguata?',
          'Buonasera dottore, ho bisogno di effettuare degli esami del sangue per monitorare la mia salute generale.',
          'Buonasera dottore, vorrei parlare con lei di un problema di disturbi del sonno che mi affligge.',
          'Buonasera dottore, ho avuto un incidente e ho bisogno di una visita ortopedica per valutare eventuali danni alle ossa.',
          'Buonasera dottore, soffro di problemi di vista, potrebbe consigliarmi degli esami oculistici?',
          'Buonasera dottore, mi sono fatto male durante attività sportiva, dovrei fare una visita ortopedica?',
          'Buonasera dottore, ho bisogno di una visita, potrebbe fissare un appuntamento?',
          'Buonasera dottore, ho notato dei disturbi alla respirazione, potrebbe essere utile una visita pneumologica?',
          'Buonasera dottore, vorrei sottopormi a un check-up completo per la prevenzione di eventuali patologie.',
          'Salve dottore, soffro di attacchi di panico, potrebbe consigliarmi una terapia adeguata?',
          'Salve dottore, ho bisogno di un referto medico per la mia assicurazione, potrebbe fornirmelo?',
          'Salve dottore, mi sento molto depresso, potrebbe prescrivermi una terapia farmacologica?',
          'Salve dottore, ho notato dei disturbi del comportamento alimentare, potrebbe consigliarmi una terapia adatta?',
          'Salve dottore, soffro di dolori addominali ricorrenti, potrebbe prescrivermi degli esami specifici?',
          'Salve dottore, vorrei effettuare un controllo, potrebbe fissare un appuntamento?',
          'Salve dottore, ho bisogno di una visita neurologica per valutare eventuali problemi al sistema nervoso.',
          'Salve dottore, mi sono fatto male al braccio, dovrei fare una radiografia per escludere eventuali fratture?',
          'Salve dottore, ho bisogno di una visita endocrinologica per valutare eventuali problemi ormonali.',
          'Salve dottore, vorrei sottopormi a un esame del sangue per verificare la mia immunità a determinate patologie.',
          'Salve dottore, soffro di problemi di pressione alta, potrebbe prescrivermi una cura adatta?',
          'Salve dottore, ho bisogno di una visita allergologica per valutare eventuali intolleranze o allergie.',
          'Salve dottore, vorrei effettuare un controllo della tiroide, potrebbe fissare un appuntamento endocrinologico?',
          'Salve dottore, ho bisogno di una visita gastroenterologica per valutare eventuali problemi al mio apparato digerente.',
          'Salve dottore, mi sono fatto male al ginocchio, dovrei fare una visita ortopedica per escludere eventuali danni al menisco?',
          'Salve dottore, soffro di problemi di respirazione durante lo sforzo fisico, potrebbe essere utile una visita pneumologica?',
          'Salve dottore, vorrei sottopormi a un esame ecografico per verificare la mia salute interna.',
        ];

        for ($i=0; $i < 250; $i++) {
            $new_message = new Message();
            $new_message->name = $faker->name();
            $new_message->text = $messages[array_rand(array_values($messages))];
            $new_message->email = $faker->email();
            $doctor_id = Doctor::inRandomOrder()->first()->id;
            $new_message->doctor_id = $doctor_id;
            $new_message->save();
        }
    }
}
