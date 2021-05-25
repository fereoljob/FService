<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTableCategorie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'nom_categorie' => 'Licence'
            ],[
                'nom_categorie' => 'Master'
            ],[
                'nom_categorie' => 'Autre Service'
            ]
        ]);
    }
}
