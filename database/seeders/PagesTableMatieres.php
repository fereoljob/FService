<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableMatieres extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            [
                'nom_matiere' => 'Algorithme et structure de données 1',
                'id_semestre' => 1,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithme et structure de données 2',
                'id_semestre' => 2,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 1',
                'id_semestre' => 2,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondement de l informatique 1',
                'id_semestre' => 2,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie des langages',
                'id_semestre' => 2,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithmique et structure de donnée 3',
                'id_semestre' => 3,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Base de donnée 1 et modélisation',
                'id_semestre' => 3,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => '3pe',
                'id_semestre' => 3,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 2',
                'id_semestre' => 4,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'XML',
                'id_semestre' => 4,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Approche orientée objet pour la programmation',
                'id_semestre' => 4,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondements de l informatique 2',
                'id_semestre' => 4,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Système et administration',
                'id_semestre' => 4,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation orientée objet c++ QT',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'écomposition Conception et Réalisation d Applications',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondement de l informatique 3',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie de langages et compilation',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithme des graphes',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie de l information et architecture',
                'id_semestre' => 5,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 3',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation fonctionnelle et logique',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Bases de données 2',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'OPtion 1 : Image de synthèse',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 2 : Traitement de données en Python',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 3 : Développement d interface graphique avancées',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 4 : Production automatisé de documents',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 5 : Initiation à la programmation de système intelligents',
                'id_semestre' => 6,
                'responsable_matiere' => null,
                'id_departement' => 1
            ]
        ]);
    }
}
