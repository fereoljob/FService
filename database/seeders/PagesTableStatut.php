<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTableStatut extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts')->insert([
            [
                'nom_statut' => 'PR',
                'nbre_heure' => '192',
                'nbre_heure_max' => '384'
            ],[
                'nom_statut' => 'MCF',
                'nbre_heure' => '192',
                'nbre_heure_max' => '384'
            ],[
                'nom_statut' => 'PRAG',
                'nbre_heure' => '384',
                'nbre_heure_max' => '768'
            ],[
                'nom_statut' => 'ATER',
                'nbre_heure' => '192',
                'nbre_heure_max' => '192'
            ],[
                'nom_statut' => 'DCCE',
                'nbre_heure' => '64',
                'nbre_heure_max' => '64'
            ],[
                'nom_statut' => 'ECER',
                'nbre_heure' => '192',
                'nbre_heure_max' => '220'
            ],[
                'nom_statut' => 'VACATAIRE',
                'nbre_heure' => '0',
                'nbre_heure_max' => '96'
            ]
        ]);
    }
}
