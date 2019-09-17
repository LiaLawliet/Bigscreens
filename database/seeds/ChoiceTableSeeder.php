<?php

use Illuminate\Database\Seeder;
use App\Choice;

class ChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $QCManswers = array(
            "question_id" => array(3, 6, 7, 8, 10, 16, 17, 18, 19),
            "answers" => array(
                ['Homme', 'Femme', 'Préfère de pas répondre'],
                ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'],
                ['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows store'],
                ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'],
                ['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team'],
                ['Oui', 'Non'],
                ['Oui', 'Non'],
                ['Oui', 'Non'],
                ['Oui', 'Non']
            )
        );
        for ($i = 0; $i < count($QCManswers['answers']); $i++) {
            for ($j = 0; $j < count($QCManswers['answers'][$i]); $j++) {
                Choice::create([
                    "question_id" => $QCManswers['question_id'][$i],
                    "answers" => $QCManswers['answers'][$i][$j]
                ]);
            }
        }
    }
}
