<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableAffectation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('affectations')->insert([
            [
                "id_partie" => 1,
                "id_professeur" => 1,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 1,
                "id_professeur" => 2,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 1,
                "id_professeur" => 3,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 2,
                "id_professeur" => 4,
                "nbre_groupe_prof" => 9
            ],[
                "id_partie" => 2,
                "id_professeur" => 5,
                "nbre_groupe_prof" => 9
            ],[
                "id_partie" => 3,
                "id_professeur" => 6,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 3,
                "id_professeur" => 7,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 4,
                "id_professeur" => 8,
                "nbre_groupe_prof" => 8
            ],[
                "id_partie" => 4,
                "id_professeur" => 9,
                "nbre_groupe_prof" => 8
            ],[
                "id_partie" => 5,
                "id_professeur" => 10,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 6,
                "id_professeur" => 11,
                "nbre_groupe_prof" => 8.75
            ],[
                "id_partie" => 7,
                "id_professeur" => 12,
                "nbre_groupe_prof" => 4.27
            ],[
                "id_partie" => 8,
                "id_professeur" => 13,
                "nbre_groupe_prof" => 4.2
            ],[
                "id_partie" => 9,
                "id_professeur" => 14,
                "nbre_groupe_prof" => 8.75
            ],[
                "id_partie" => 10,
                "id_professeur" => 15,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 11,
                "id_professeur" => 16,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 12,
                "id_professeur" => 17,
                "nbre_groupe_prof" => 7
            ],[
                "id_partie" => 13,
                "id_professeur" => 18,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 14,
                "id_professeur" => 19,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 15,
                "id_professeur" => 20,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 16,
                "id_professeur" => 21,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 17,
                "id_professeur" => 22,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 18,
                "id_professeur" => 23,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 19,
                "id_professeur" => 24,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 20,
                "id_professeur" => 25,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 21,
                "id_professeur" => 26,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 22,
                "id_professeur" => 27,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 23,
                "id_professeur" => 28,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 24,
                "id_professeur" => 29,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 25,
                "id_professeur" => 30,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 26,
                "id_professeur" => 31,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 27,
                "id_professeur" => 32,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 28,
                "id_professeur" => 32,
                "nbre_groupe_prof" => 4
            ],[
                "id_partie" => 29,
                "id_professeur" => 33,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 30,
                "id_professeur" => 34,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 31,
                "id_professeur" => 35,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 32,
                "id_professeur" => 1,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 33,
                "id_professeur" => 2,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 34,
                "id_professeur" => 3,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 35,
                "id_professeur" => 4,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 36,
                "id_professeur" => 5,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 37,
                "id_professeur" => 6,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 38,
                "id_professeur" => 7,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 39,
                "id_professeur" => 8,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 40,
                "id_professeur" => 9,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 41,
                "id_professeur" => 10,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 42,
                "id_professeur" => 11,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 43,
                "id_professeur" => 12,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 44,
                "id_professeur" => 13,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 45,
                "id_professeur" => 14,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 46,
                "id_professeur" => 15,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 47,
                "id_professeur" => 16,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 48,
                "id_professeur" => 17,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 49,
                "id_professeur" => 18,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 50,
                "id_professeur" => 19,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 51,
                "id_professeur" => 20,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 52,
                "id_professeur" => 21,
                "nbre_groupe_prof" => 3
            ],[
                "id_partie" => 53,
                "id_professeur" => 22,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 54,
                "id_professeur" => 23,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 55,
                "id_professeur" => 24,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 56,
                "id_professeur" => 25,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 57,
                "id_professeur" => 26,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 58,
                "id_professeur" => 27,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 59,
                "id_professeur" => 28,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 60,
                "id_professeur" => 29,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 61,
                "id_professeur" => 30,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 62,
                "id_professeur" => 31,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 63,
                "id_professeur" => 31,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 64,
                "id_professeur" => 32,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 65,
                "id_professeur" => 33,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 66,
                "id_professeur" => 34,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 67,
                "id_professeur" => 35,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 68,
                "id_professeur" => 1,
                "nbre_groupe_prof" => 2
            ],[
                "id_partie" => 69,
                "id_professeur" => 2,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 70,
                "id_professeur" => 3,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 71,
                "id_professeur" => 4,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 72,
                "id_professeur" => 5,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 73,
                "id_professeur" => 6,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 74,
                "id_professeur" => 7,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 75,
                "id_professeur" => 8,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 76,
                "id_professeur" => 9,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 77,
                "id_professeur" => 10,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 78,
                "id_professeur" => 11,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 79,
                "id_professeur" => 12,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 80,
                "id_professeur" => 13,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 81,
                "id_professeur" => 14,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 82,
                "id_professeur" => 15,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 83,
                "id_professeur" => 16,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 84,
                "id_professeur" => 17,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 85,
                "id_professeur" => 18,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 86,
                "id_professeur" => 19,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 87,
                "id_professeur" => 20,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 88,
                "id_professeur" => 21,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 89,
                "id_professeur" => 22,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 90,
                "id_professeur" => 23,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 91,
                "id_professeur" => 24,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 92,
                "id_professeur" => 25,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 93,
                "id_professeur" => 26,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 94,
                "id_professeur" => 27,
                "nbre_groupe_prof" => 1
            ],[
                "id_partie" => 95,
                "id_professeur" => 28,
                "nbre_groupe_prof" => 1
            ]
        ]);
    }
}
