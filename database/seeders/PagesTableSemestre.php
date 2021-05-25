<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTableSemestre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semestres')->insert([
            [
                'nom_semestre' => 'Semestre 1',
                'id_niveau' => 1
            ],[
                'nom_semestre' => 'Semestre 2',
                'id_niveau' => 1
            ],[
                'nom_semestre' => 'Semestre 3',
                'id_niveau' => 2
            ],[
                'nom_semestre' => 'Semestre 4',
                'id_niveau' => 2
            ],[
                'nom_semestre' => 'Semestre 5',
                'id_niveau' => 3
            ],[
                'nom_semestre' => 'Semestre 6',
                'id_niveau' => 3
            ],[
                'nom_semestre' => 'UE 0',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 1',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 2',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 3',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 4',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 5',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 6',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 7',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 8',
                'id_niveau' => 4
            ],[
                'nom_semestre' => 'UE 9',
                'id_niveau' => 4
            ]
        ]);
    }
}
