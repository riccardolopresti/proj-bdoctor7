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
            "<li> Test di gravidanza </li>",
            "<li> Analisi del sangue </li>",
            "<li> Vaccinazioni </li>" ,
            "<li> Test delle allergie </li>",
            "<li> Visite di routine dal  medico di base </li>",
            "<li> Controllo della glicemia </li>" ,
            "<li> Test dell'HIV </li>" ,
            "<li> Radiografie </li>",
            "<li> Ecografia </li>",
            "<li> Colonscopia </li>",
            "<li> Endoscopia </li>",
            "<li> Esami del sangue per la diagnosi del cancro </li>",
            "<li> Elettrocardiogramma (ECG) </li>" ,
            "<li> Esami del sangue per la diagnosi delle malattie cardiache </li>",
            "<li> Esame degli occhi </li>" ,
            "<li> Esame dell'udito </ li>",
            "<li> Esame della vista  </li>",
            "<li> Controllo del peso  </li>",
            "<li> Controllo della funzionalità renale </li>",
            "<li> Test della funzionalità epatica </li>",
            "<li> Esame del tratto urinario </li>" ,
            "<li> Esame del sangue per la dia gnosi delle malattie epatiche </li>",
            "<li> Test della funzionalità tiroidea </li>" ,
            "<li> Esame del sistema nervoso </li>" ,
            "<li> Esame delle funzioni polmonari </li>",
            "<li> Esame della funzione renale </li>",
            "<li> Esame della funzione cardiaca  </li>",
            "<li> Esame delle funzioni digestive  </li>",
            "<li> Esame della funzione muscolare </li>",
            "<li> Esame della funzione articolare  </li>",
            "<li> Esame della funzione respiratoria  </li>",
            "<li> Esame della funzione del sistema im munitario </li>",
            "<li> Esame della funzione del sistema endocrino </li>",
            "<li> Esame della funzione del sistema riproduttivo </li>",
            "<li> Esame delle funzioni cognitive </li>" ,
            "<li> Esame della funzione psicologica  </li>",
            "<li> Esame delle funzioni emotive </li> ",
            "<li> Esame delle funzioni sociali </li>",
            "<li> Esame delle funzioni spirituali </li>",
            "<li> Trattamento della depressione </li>",
            "<li> Trattamento dell'ansia </li>" ,
            "<li> Trattamento della schizo frenia </li>",
            "<li> Trattamento del disturbo bipolare </li>",
            "<li> Trattamento dei disturbi del sonno </li>",
            "<li> Trattamento dell'asma </li>" ,
            "<li> Trattamento del diabete </li>",
            "<li> Trattamento dell'ipertensione </li>",
            "<li> Trattamento delle malattie cardiache </li>",
            "<li> Trattamento del cancro </li>"
        ];

        $images =[
            "https://images.unsplash.com/photo-1618077360395-f3068be8e001?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bWlkZGxlJTIwYWdlZCUyMHBlcnNvbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1590086782957-93c06ef21604?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8iMHxzZWFyY2h8MjB8fG1pZGRsZSUyMGFnZWQlMjBwZXJzb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60i", "https://images.unsplash.com/photo-1608127010513-2c9fc1638893?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fG1pZGRsZSUyMGFnZWQlMjBwZXJzb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1559687495-6ed41da2c140?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDd8fG1pZGRsZSUyMGFnZWQlMjBwZXJzb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1530268729831-4b0b9e170218?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTQyfHxtaWRkbGUlMjBhZ2VkJTIwcGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1559856553-823ca11d1518?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjEyfHxtaWRkbGUlMjBhZ2VkJTIwcGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1465406325903-9d93ee82f613?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjMxfHxtaWRkbGUlMjBhZ2VkJTIwcGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8ZG9jdG9yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8ZG9jdG9yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1537368910025-700350fe46c7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGRvY3RvcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGRvY3RvcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fGRvY3RvcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1612523138351-4643808db8f3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODJ8fGRvY3RvcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTM1fHxkb2N0b3J8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=6", "https://images.unsplash.com/photo-1627907912793-28208bc69dd4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bWlkZGxlJTIwYWdlZCUyMHBlcnNvbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60", "https://media.istockphoto.com/id/1311511363/photo/headshot-portrait-of-smiling-male-doctor-with-tablet.jpg?s=612x612&w=0&k=20&c=w5TecWtlA_ZHRpfGh20II-nq5AvnhpFu6BfOfMHuLMA=", "https://media.istockphoto.com/id/1330046035/photo/headshot-portrait-of-smiling-female-doctor-in-hospital.jpg?s=612x612&w=0&k=20&c=fsNQPbmFIxoKA-PXl3G745zj7Cvr_cFIGsYknSbz_Tg=", "https://www.jeanlouismedical.com/img/doctor-profile-small.png", "https://t4.ftcdn.net/jpg/01/36/18/77/360_F_136187711_qeBMOwkPdTg1dCN8e5TR1AmduXDz60Xn.jpg", "https://thumbs.dreamstime.com/b/outdoor-portrait-male-doctor-wearing-white-lab-coat-smiling-to-camera-35801901.jpg", "https://www.staffcare.com/siteassets/blogs/advice-and-insights/trends-affecting-physician-jobs.jpg", "https://imageio.forbes.com/specials-images/imageserve/103575981/A-medical-doctor-feeling-confident-about-a-career-change-/960x0.jpg?format=jpg&width=960", "https://www.filosofemme.it/wp-content/uploads/2021/01/immagini-per-sito-1-905x613.png", "https://www.mymed-job.de/s/cc_images/teaserbox_2476059314.jpg?t=1523171340", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMNGCyXSXblHlmNv2cWv-vhC9uak9swZuRwSoccaqHWa72LEVQagSVm44WPGhJDuuoyKg&usqp=CAU", "https://blogfeed.ulistic-projects.com/wp-content/uploads/2017/02/ThinkstockPhotos-508387030.jpg", "https://media.istockphoto.com/id/537738697/photo/heroes-are-ordinary-people-who-make-themselves-extraordinary.jpg?s=612x612&w=0&k=20&c=x3VSEwMniwNg4JEy_IDSGPLof8tiVaFDXCHmhUwSAQk=", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpx1RkHx1-c6yMZBgG0W7GL-6fRMNqdvTjX52v-PVmhneV3WBLifV6dJ5FlX7lw3C6Fp4&usqp=CAU", "https://www.shutterstock.com/image-photo/head-shot-portrait-smiling-young-260nw-1809574675.jpg", "https://images.pexels.com/photos/3714743/pexels-photo-3714743.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5327585/pexels-photo-5327585.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/4225880/pexels-photo-4225880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5327656/pexels-photo-5327656.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5327921/pexels-photo-5327921.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5407206/pexels-photo-5407206.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5214958/pexels-photo-5214958.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5452268/pexels-photo-5452268.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/6129500/pexels-photo-6129500.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/3846038/pexels-photo-3846038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/15559917/pexels-photo-15559917.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/15559914/pexels-photo-15559914.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/6749773/pexels-photo-6749773.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/8376309/pexels-photo-8376309.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/6098047/pexels-photo-6098047.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/6303564/pexels-photo-6303564.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/8460370/pexels-photo-8460370.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/5207104/pexels-photo-5207104.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/6234600/pexels-photo-6234600.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://lucknow.apollohospitals.com/wp-content/uploads/2021/doctors/7.jpg", "https://www.peopletreehospitals.com/images/doctors/Diwakar.png", "https://www.eatthis.com/wp-content/uploads/sites/4/2022/02/doctor-male-mature.jpg?quality=82&strip=1", "https://ichef.bbci.co.uk/news/624/mcs/media/images/76055000/jpg/_76055361_482566485.jpg", "https://www.census.gov/newsroom/stories/doctors-day/_jcr_content/root/responsivegrid/imagecore.coreimg.jpeg/1647978611961/stories-doctors-1300x867.jpeg", "https://www.felixhospital.com/sites/default/files/2022-11/dr-dk-gupta.jpg", "https://www.kauveryhospital.com/doctorimage/recent/Dr.-Kandasamy2022-09-12-06:30:01am.jpg", "https://www.uclahealth.org/sites/default/files/styles/portrait_3x4_016000_480x640/public/images/female-doc-with-other-docs.jpg?h=dd028d5a&itok=SJItHRgC", "https://images.theconversation.com/files/304957/original/file-20191203-66986-im7o5.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop", "https://www.umhs-sk.org/hs-fs/hubfs/how-to-become-a-family-medicine-doctor.jpeg?width=255&name=how-to-become-a-family-medicine-doctor.jpeg", "https://media.istockphoto.com/id/138205019/photo/happy-healthcare-practitioner.jpg?s=612x612&w=0&k=20&c=b8kUyVtmZeW8MeLHcDsJfqqF0XiFBjq6tgBQZC7G0f0=", "https://cerebralpalsynewstoday.com/wp-content/uploads/2017/06/shutterstock_52856165-921x480@2x.jpg", "http://www.kauveryhospital.com/doctorimage/recent/Dr.Muthulakshmi2022-02-09-01:18:39pm.jpg", "https://www.cerner.com/-/media/cerner-media-united-states/blog-images/9-cant-miss-blogs-for-national-doctors-day.jpg?vs=1&h=1651&w=2934&la=en&hash=E740ED92AFB4E670B1B8C94FEA6CEBDA", "https://purepng.com/public/uploads/large/purepng.com-doctordoctorsdoctors-and-nursesclinicianmedical-practitionernotepadfemale-1421526857295nzsqt.png", "https://purepng.com/public/uploads/large/purepng.com-doctorsdoctorsdoctors-and-nursesa-qualified-practitioner-of-medicine-aclinicianmedical-practitionermale-doctornotepad-1421526857009zrma0.png", "https://deadline.com/wp-content/uploads/2020/08/dr.-ian-smith.jpg", "https://www.careersportal.co.za/sites/default/files/images/Terrique%20Faro/doctor.jpg", "https://img.freepik.com/free-photo/woman-doctor-wearing-lab-coat-with-stethoscope-isolated_1303-29791.jpg?w=360", "https://medsurgesurgical.com/wp-content/uploads/elementor/thumbs/diverse-medical-team-of-doctors-looking-at-camera-while-holding-clipboard-and-medical-files-pn4qr876gft6walptmuwy4dm0sf3hwwvck30hwyjuo.jpg", "https://www.peopletreehospitals.com/images/doctors/Manjunath.png", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBYuczpHwKm0XbnDo-nv-1vkkMr1NO-TJ_FTcuUxoLKPzZYtYN8WbeO134kEYrCWFElfo&usqp=CAU", "https://go.vcuhealth.org/media/PhysicianPhotos/Patel_3877.jpg",
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png',
            'https://www.indrenetwork.com/sites/default/files/2019-11/silueta_6_0.png'
        ];

        foreach ($users as $user) {
            $new_doctor = new Doctor();
            $new_doctor->user_id = $user->id;
            $new_doctor->surname = $faker->lastName();
            $new_doctor->slug = Str::slug($user->name . '-' . $new_doctor->surname);
            $new_doctor->address = $faker->streetAddress();
            $new_doctor->image = $images[array_rand(array_values($images), 1)];
            $new_doctor->phone = $faker->phoneNumber();
            $new_doctor->health_care = $health_care_services[array_rand(array_values($health_care_services))] . $health_care_services[array_rand(array_values($health_care_services))] . $health_care_services[array_rand(array_values($health_care_services))];
            //dd($new_doctor);
            $new_doctor->save();
        }
    }
}
