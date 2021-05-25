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
                'id_categorie' => null,
                'responsable_annee' => null
            ],[
                'nom_niveau' => 'Licence 2',
                'id_categorie' => null,
                'responsable_annee' => null
            ],[
                'nom_niveau' => 'Licence 3',
                'id_categorie' => null,
                'responsable_annee' => null,
            ],[
                'nom_niveau' => 'Licence 3 Pro',
                'id_categorie' => null,
                'responsable_annee' => null
            ],[
                'nom_niveau' => 'Master 1',
                'id_categorie' => null,
                'responsable_annee' => null,
            ],[
                'nom_niveau' => 'Master 2',
                'id_categorie' => null,
                'responsable_annee' => null
            ]
        ]);
    }
}
