<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableNiveauEtude extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveau_etudes')->insert([
            [
                'nom_niveau' => 'Licence 1',
                'id_categorie' => 1,
                'responsable_annee' => 1
            ],[
                'nom_niveau' => 'Licence 2',
                'id_categorie' => 1,
                'responsable_annee' => 18
            ],[
                'nom_niveau' => 'Licence 3',
                'id_categorie' => 1,
                'responsable_annee' => 12
            ],[
                'nom_niveau' => 'Licence 3 Pro',
                'id_categorie' => 1,
                'responsable_annee' => 9
            ],[
                'nom_niveau' => 'Master 1',
                'id_categorie' => 2,
                'responsable_annee' => 7,
            ],[
                'nom_niveau' => 'Master 2',
                'id_categorie' => 2,
                'responsable_annee' => 11
            ]
        ]);
    }
}
