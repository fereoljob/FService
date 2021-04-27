<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableProfesseurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nom_professeurs' => 'AIT EI MEKKI',
                'prenom_professeurs' => 'Touria',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[
                'nom_professeurs' => 'AMGHAR',
                'prenom_professeurs' => 'Tassadit',
                'service' => '168',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'BARICHARD',
                'prenom_professeurs' => 'Vincent',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'BASSEUR',
                'prenom_professeurs' => 'Mathieu',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'DA MOTA',
                'prenom_professeurs' => 'Benoit',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'DIEGUEZ',
                'prenom_professeurs' => 'Martin',
                'service' => '160',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'DUVAL',
                'prenom_professeurs' => 'Béatrice'
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[
                'nom_professeurs' => 'GARCIA',
                'prenom_professeurs' => 'Laurent'
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[
                'nom_professeurs' => 'GENEST',
                'prenom_professeurs' => 'David',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[
                'nom_professeurs' => 'GOEFFON',
                'prenom_professeurs' => 'Adrien',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'GOUDET',
                'prenom_professeurs' => 'Olivier',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'HAIMEZ',
                'prenom_professeurs' => 'Jean-Philippe',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'HAO',
                'prenom_professeurs' => 'Jin-Kao',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'HUNAULT',
                'prenom_professeurs' => 'Gilles',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'LARDEUX',
                'prenom_professeurs' => 'Frédéric',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'LEFEVRE',
                'prenom_professeurs' => 'Claire',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'LESAINT',
                'prenom_professeurs' => 'David',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'LOISEAU',
                'prenom_professeurs' => 'Stéphane',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'MONFROY',
                'prenom_professeurs' => 'Eric',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'RICHER',
                'prenom_professeurs' => 'Jean-Michel',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'SAUBION',
                'prenom_professeurs' => 'Frédéric',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'STEPHAN',
                'prenom_professeurs' => 'Igor',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'WELSH',
                'prenom_professeurs' => 'Marie-Christine',
                'service' => '365',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'LEGEAY',
                'prenom_professeurs' => 'Marc',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
                'nom_professeurs' => 'Jamin',
                'prenom_professeurs' => 'Antoine',
                'service' => '192',
                'id_statut' => '1',
                'id_departement' => '1'
            ],[ 
        ]);
    }
}
