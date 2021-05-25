<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTableTypeEnseignement extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_enseignements')->insert([
            [
                'nom_type_enseignement' => 'C',
                'coefficient' => 1
            ],[
                'nom_type_enseignement' => 'C/TD',
                'coefficient' => 1.25
            ]
            ,[
                'nom_type_enseignement' => 'TD',
                'coefficient' => 1.5
            ],[
                'nom_type_enseignement' => 'TP',
                'coefficient' => 1.5
            ]
        ]);
    }
}
