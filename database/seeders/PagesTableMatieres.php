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

                // Matières Licences

            [
                'nom_matiere' => 'Algorithme et structure de données 1',
                'id_semestre' => 1,
                'responsable_matiere' => 5,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithme et structure de données 2',
                'id_semestre' => 2,
                'responsable_matiere' => 3,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 1',
                'id_semestre' => 2,
                'responsable_matiere' => 18,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondement de l informatique 1',
                'id_semestre' => 2,
                'responsable_matiere' => 17,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie des langages',
                'id_semestre' => 2,
                'responsable_matiere' => 12,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithmique et structure de donnée 3',
                'id_semestre' => 3,
                'responsable_matiere' => 9,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Base de donnée 1 et modélisation',
                'id_semestre' => 3,
                'responsable_matiere' => 5,
                'id_departement' => 1
            ],[
                'nom_matiere' => '3pe',
                'id_semestre' => 3,
                'responsable_matiere' => 4,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 2',
                'id_semestre' => 4,
                'responsable_matiere' => 16,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'XML',
                'id_semestre' => 4,
                'responsable_matiere' => 22,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Approche orientée objet pour la programmation',
                'id_semestre' => 4,
                'responsable_matiere' => 4,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondements de l informatique 2',
                'id_semestre' => 4,
                'responsable_matiere' => 8,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Système et administration',
                'id_semestre' => 4,
                'responsable_matiere' => 1,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation orientée objet c++ QT',
                'id_semestre' => 5,
                'responsable_matiere' => 2,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Décomposition Conception et Réalisation d Applications',
                'id_semestre' => 5,
                'responsable_matiere' => 7,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Fondement de l informatique 3',
                'id_semestre' => 5,
                'responsable_matiere' => 4,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie de langages et compilation',
                'id_semestre' => 5,
                'responsable_matiere' => 19,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithme des graphes',
                'id_semestre' => 5,
                'responsable_matiere' => 7,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Théorie de l information et architecture',
                'id_semestre' => 5,
                'responsable_matiere' => 8,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web 3',
                'id_semestre' => 6,
                'responsable_matiere' => 7,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation fonctionnelle et logique',
                'id_semestre' => 6,
                'responsable_matiere' => 13,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Bases de données 2',
                'id_semestre' => 6,
                'responsable_matiere' => 11,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 1 : Image de synthèse',
                'id_semestre' => 6,
                'responsable_matiere' => 5,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 2 : Traitement de données en Python',
                'id_semestre' => 6,
                'responsable_matiere' => 1,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 3 : Développement d interface graphique avancées',
                'id_semestre' => 6,
                'responsable_matiere' => 8,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 4 : Production automatisé de documents',
                'id_semestre' => 6,
                'responsable_matiere' => 21,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 5 : Initiation à la programmation de système intelligents',
                'id_semestre' => 6,
                'responsable_matiere' => 8,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Informatique',
                'id_semestre' => 5,
                'responsable_matiere' => 9,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Mise à niveau',
                'id_semestre' => 7,
                'responsable_matiere' => 7,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Utlisation des systèmes et réseaux',
                'id_semestre' => 8,
                'responsable_matiere' => 6,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Installation et configuration des systèmes et réseaux',
                'id_semestre' => 9,
                'responsable_matiere' => 16,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Progiciel de gestion intégré',
                'id_semestre' => 9,
                'responsable_matiere' => 15,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Conception des systèmes d information',
                'id_semestre' => 10,
                'responsable_matiere' => 12,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Base de données',
                'id_semestre' => 10,
                'responsable_matiere' => 10,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Algorithme et programmation',
                'id_semestre' => 11,
                'responsable_matiere' => 20,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation orentée objet',
                'id_semestre' => 12,
                'responsable_matiere' => 9,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement Web',
                'id_semestre' => 13,
                'responsable_matiere' => 17,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Gestion de projets',
                'id_semestre' => 14,
                'responsable_matiere' => 20,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Projet 1 FI 1h eq TD par étudiant',
                'id_semestre' => 15,
                'responsable_matiere' => 21,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Projet 2 FI 1h eq TD par étudiant',
                'id_semestre' => 15,
                'responsable_matiere' => 14,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Projet Alt. 2h eq TD par alt.',
                'id_semestre' => 15,
                'responsable_matiere' => 13,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Stage FI 3h eq TD par étudiant 2020-21',
                'id_semestre' => 16,
                'responsable_matiere' => 19,
                'id_departement' => 1
            ]

                //Matière Masters

            ,[
                'nom_matiere' => 'Design Patterns',
                'id_semestre' => 17,
                'responsable_matiere' => 13,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Organisation et conduite de projets',
                'id_semestre' => 17,
                'responsable_matiere' => 11,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Réseaux',
                'id_semestre' => 17,
                'responsable_matiere' => 11,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Développement mobile',
                'id_semestre' => 17,
                'responsable_matiere' => 2,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Intelligence artificielle 1',
                'id_semestre' => 17,
                'responsable_matiere' => 3,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Introduction à la résolution de problèmes',
                'id_semestre' => 17,
                'responsable_matiere' => 4,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Optimisation linéaire',
                'id_semestre' => 17,
                'responsable_matiere' => 5,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Concrétisation disciplinaire',
                'id_semestre' => 17,
                'responsable_matiere' => 3,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 1.1 : Programmation parallèle avec CUDA',
                'id_semestre' => 17,
                'responsable_matiere' => 1,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 1.2 : Applications web temps réel',
                'id_semestre' => 17,
                'responsable_matiere' => 8,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 1.3 : Création, développement et éxecution de conteneurs logiciels',
                'id_semestre' => 17,
                'responsable_matiere' => 1,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 1.4 : Recherche documentaire',
                'id_semestre' => 17,
                'responsable_matiere' => 13,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Programmation systèmes et réseaux',
                'id_semestre' => 18,
                'responsable_matiere' => 11,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Web des données',
                'id_semestre' => 18,
                'responsable_matiere' => 12,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Web anvancé',
                'id_semestre' => 18,
                'responsable_matiere' => 4,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Intelligence artificielle 2',
                'id_semestre' => 18,
                'responsable_matiere' => 23,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Optimisation combinatoire',
                'id_semestre' => 18,
                'responsable_matiere' => 22,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Option 2.1 : Apprentissage artificiel',
                'id_semestre' => 18,
                'responsable_matiere' => 22,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Traitement automatique du langage naturel',
                'id_semestre' => 18,
                'responsable_matiere' => 18,
                'id_departement' => 1
            ],[
                'nom_matiere' => 'Représentation des connaissances et raisonnement en présence d informations imparfaites',
                'id_semestre' => 18,
                'responsable_matiere' => 17,
                'id_departement' => 1
            ]
        ]);
    }
}
