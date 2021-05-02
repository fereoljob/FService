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
                'id_niveau' => null
            ],[
                'nom_semestre' => 'Semestre 2',
                'id_niveau' => null
            ],[
                'nom_semestre' => 'Semestre 3',
                'id_niveau' => null
            ],[
                'nom_semestre' => 'Semestre 4',
                'id_niveau' => null
            ],[
                'nom_semestre' => 'Semestre 5',
                'id_niveau' => null
            ],[
                'nom_semestre' => 'Semestre 6',
                'id_niveau' => null
            ]
        ]);
    }
}