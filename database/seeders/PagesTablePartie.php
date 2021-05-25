<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTablePartie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            [
                "id_matiere" => 1,
                "type_enseignement" => "C/TD",
                "nbre_heure" => 31,
                "nbre_groupe" => 9
            ],[
                "id_matiere" => 1,
                "type_enseignement" => "TP",
                "nbre_heure" => 24,
                "nbre_groupe" => 18
            ],[
                "id_matiere" => 2,
                "type_enseignement" => "C/TD",
                "nbre_heure" => 16,
                "nbre_groupe" => 8
            ],[
                "id_matiere" => 2,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 16
            ],[
                "id_matiere" => 3,
                "type_enseignement" => "C/TD",
                "nbre_heure" => 16,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 3,
                "type_enseignement" => "TP",
                "nbre_heure" => 24,
                "nbre_groupe" => 8.75
            ],[
                "id_matiere" => 4,
                "type_enseignement" => "C/TD",
                "nbre_heure" => 44,
                "nbre_groupe" => 4.27
            ],[
                "id_matiere" => 5,
                "type_enseignement" => "C/TD",
                "nbre_heure" => 40,
                "nbre_groupe" => 4.2
            ],[
                "id_matiere" => 5,
                "type_enseignement" => "TP",
                "nbre_heure" => 6,
                "nbre_groupe" => 8.75
            ],[
                "id_matiere" => 6,
                "type_enseignement" => "C",
                "nbre_heure" => 18,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 6,
                "type_enseignement" => "TD",
                "nbre_heure" => 24,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 6,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 7
            ],[
                "id_matiere" => 7,
                "type_enseignement" => "C",
                "nbre_heure" => 26,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 7,
                "type_enseignement" => "TD",
                "nbre_heure" => 20,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 7,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 8,
                "type_enseignement" => "TD",
                "nbre_heure" => 16,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 9,
                "type_enseignement" => "C",
                "nbre_heure" => 28,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 9,
                "type_enseignement" => "TP",
                "nbre_heure" => 24,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 10,
                "type_enseignement" => "C",
                "nbre_heure" => 13,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 10,
                "type_enseignement" => "TP",
                "nbre_heure" => 8,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 11,
                "type_enseignement" => "C",
                "nbre_heure" => 24,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 11,
                "type_enseignement" => "TD",
                "nbre_heure" => 20,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 11,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 12,
                "type_enseignement" => "C",
                "nbre_heure" => 24,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 12,
                "type_enseignement" => "TD",
                "nbre_heure" => 20,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 13,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 13,
                "type_enseignement" => "TD",
                "nbre_heure" => 16,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 13,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 4
            ],[
                "id_matiere" => 14,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 14,
                "type_enseignement" => "TP",
                "nbre_heure" => 44,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 15,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 15,
                "type_enseignement" => "TD",
                "nbre_heure" => 12,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 15,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 16,
                "type_enseignement" => "C",
                "nbre_heure" => 24,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 16,
                "type_enseignement" => "TD",
                "nbre_heure" => 24,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 17,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 17,
                "type_enseignement" => "TD",
                "nbre_heure" => 16,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 17,
                "type_enseignement" => "TP",
                "nbre_heure" => 12,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 18,
                "type_enseignement" => "C",
                "nbre_heure" => 12,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 18,
                "type_enseignement" => "TD",
                "nbre_heure" => 4,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 18,
                "type_enseignement" => "TP",
                "nbre_heure" => 8,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 19,
                "type_enseignement" => "C",
                "nbre_heure" => 24,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 19,
                "type_enseignement" => "TD",
                "nbre_heure" => 14,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 19,
                "type_enseignement" => "TP",
                "nbre_heure" => 10,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 20,
                "type_enseignement" => "C",
                "nbre_heure" => 16,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 20,
                "type_enseignement" => "TP",
                "nbre_heure" => 24,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 21,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 21,
                "type_enseignement" => "TD",
                "nbre_heure" => 12,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 21,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 22,
                "type_enseignement" => "C",
                "nbre_heure" => 12,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 22,
                "type_enseignement" => "TD",
                "nbre_heure" => 12,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 22,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 3
            ],[
                "id_matiere" => 23,
                "type_enseignement" => "C",
                "nbre_heure" => 8,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 23,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 24,
                "type_enseignement" => "C",
                "nbre_heure" => 9,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 24,
                "type_enseignement" => "TD",
                "nbre_heure" => 6,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 24,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 25,
                "type_enseignement" => "C",
                "nbre_heure" => 4,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 25,
                "type_enseignement" => "TP",
                "nbre_heure" => 24,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 26,
                "type_enseignement" => "C",
                "nbre_heure" => 8,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 26,
                "type_enseignement" => "TD",
                "nbre_heure" => 4,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 26,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 27,
                "type_enseignement" => "C",
                "nbre_heure" => 8,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 27,
                "type_enseignement" => "TD",
                "nbre_heure" => 4,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 27,
                "type_enseignement" => "TP",
                "nbre_heure" => 16,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 28,
                "type_enseignement" => "C",
                "nbre_heure" => 14,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 28,
                "type_enseignement" => "TD",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 28,
                "type_enseignement" => "TP",
                "nbre_heure" => 14,
                "nbre_groupe" => 2
            ],[
                "id_matiere" => 29,
                "type_enseignement" => "C",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 29,
                "type_enseignement" => "TD",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 29,
                "type_enseignement" => "TP",
                "nbre_heure" => 10,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 30,
                "type_enseignement" => "C",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 30,
                "type_enseignement" => "TD",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 30,
                "type_enseignement" => "TP",
                "nbre_heure" => 30,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 31,
                "type_enseignement" => "C",
                "nbre_heure" => 10,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 31,
                "type_enseignement" => "TD",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 31,
                "type_enseignement" => "TP",
                "nbre_heure" => 25,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 32,
                "type_enseignement" => "C",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 32,
                "type_enseignement" => "TP",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 33,
                "type_enseignement" => "C",
                "nbre_heure" => 10,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 33,
                "type_enseignement" => "TD",
                "nbre_heure" => 10,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 34,
                "type_enseignement" => "C",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 34,
                "type_enseignement" => "TD",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 34,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 35,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 35,
                "type_enseignement" => "TD",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 35,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 36,
                "type_enseignement" => "C",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 36,
                "type_enseignement" => "TD",
                "nbre_heure" => 15,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 36,
                "type_enseignement" => "TP",
                "nbre_heure" => 20,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 37,
                "type_enseignement" => "C",
                "nbre_heure" => ,20
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 37,
                "type_enseignement" => "TD",
                "nbre_heure" => 10,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 37,
                "type_enseignement" => "TP",
                "nbre_heure" => 30,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 38,
                "type_enseignement" => "C",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],[
                "id_matiere" => 38,
                "type_enseignement" => "TP",
                "nbre_heure" => 5,
                "nbre_groupe" => 1
            ],
        ]);
    }
}
