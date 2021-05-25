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
                     PagesTableStatut::class,
                     PagesTableTypeEnseignement::class,
                     PagesTableCategorie::class,
                     PagesTableDepartement::class,
                     PagesTableProfesseurs::class,
                     PagesTableNiveauEtude::class,
                     PagesTableSemestre::class,
                     PagesTableMatieres::class,
                     PagesTablePartie::class, 
                     
                     
                     
        ]);
    }
}
