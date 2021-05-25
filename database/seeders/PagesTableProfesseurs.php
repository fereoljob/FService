<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableProfesseurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('professeurs')->insert([
            [
                'nom_professeur' => 'AIT EI MEKKI',
                'prenom_professeur' => 'Touria',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[
                'nom_professeur' => 'AMGHAR',
                'prenom_professeur' => 'Tassadit',
                'service' => 168,
                'id_statut' => 1,
                'id_departement' => 1

            ],[ 
                'nom_professeur' => 'BARICHARD',
                'prenom_professeur' => 'Vincent',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'BASSEUR',
                'prenom_professeur' => 'Mathieu',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'DA MOTA',
                'prenom_professeur' => 'Benoit',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'DIEGUEZ',
                'prenom_professeur' => 'Martin',
                'service' => 160,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'DUVAL',
                'prenom_professeur' => 'Béatrice',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[
                'nom_professeur' => 'GARCIA',
                'prenom_professeur' => 'Laurent',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[
                'nom_professeur' => 'GENEST',
                'prenom_professeur' => 'David',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[
                'nom_professeur' => 'GOEFFON',
                'prenom_professeur' => 'Adrien',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'GOUDET',
                'prenom_professeur' => 'Olivier',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'HAIMEZ',
                'prenom_professeur' => 'Jean-Philippe',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'HAO',
                'prenom_professeur' => 'Jin-Kao',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'HUNAULT',
                'prenom_professeur' => 'Gilles',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LARDEUX',
                'prenom_professeur' => 'Frédéric',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LEFEVRE',
                'prenom_professeur' => 'Claire',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LESAINT',
                'prenom_professeur' => 'David',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LOISEAU',
                'prenom_professeur' => 'Stéphane',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'MONFROY',
                'prenom_professeur' => 'Eric',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'RICHER',
                'prenom_professeur' => 'Jean-Michel',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'SAUBION',
                'prenom_professeur' => 'Frédéric',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'STEPHAN',
                'prenom_professeur' => 'Igor',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'WELSH',
                'prenom_professeur' => 'Marie-Christine',
                'service' => 365,
                'id_statut' => 3,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LEGEAY',
                'prenom_professeur' => 'Marc',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'JAMIN',
                'prenom_professeur' => 'Antoine',
                'service' => 192,
                'id_statut' => 1,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'VASCONCELLOS',
                'prenom_professeur' => 'Claudia',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LEGUY',
                'prenom_professeur' => 'Jules',
                'service' => 64,
                'id_statut' => 5,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'GRELIER',
                'prenom_professeur' => 'Cyril',
                'service' => 64,
                'id_statut' => 5,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'CHANTREIN',
                'prenom_professeur' => 'Jean-Mathieu',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'TODOSKOFF',
                'prenom_professeur' => 'Alexis',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LEDUC',
                'prenom_professeur' => 'Lionel',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'TELETCHEA',
                'prenom_professeur' => 'Stéphane',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'DEVRED',
                'prenom_professeur' => 'Caroline',
                'service' => 192,
                'id_statut' => 2,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'DELAVERNHE',
                'prenom_professeur' => 'Florian',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ],[ 
                'nom_professeur' => 'LE CALVAR',
                'prenom_professeur' => 'Théo',
                'service' => 96,
                'id_statut' => 7,
                'id_departement' => 1
            ]
        ]);
    }
}
