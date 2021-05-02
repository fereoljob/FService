<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PagesTableUsers::class,
                     PagesTableProfesseurs::class,
                     PagesTableSemestre::class,
                     PagesTableDepartement::class,
                     PagesTableMatieres::class,
                     PagesTableNiveauEtude::class,
                     PagesTablePartie::class, // Rien de ce fichier pour l'instant
                     PagesTableStatut::class,
                     PagesTableTypeEnseignement::class,
                     
        ]);
    }
}
