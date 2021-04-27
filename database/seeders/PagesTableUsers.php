<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesTableUsers extends Seeder
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
                'nom' => 'Genest',
                'prenom' => 'David',
                'email' => 'Genset.David@etud.univ-angers.fr',
                'type_user' => 'Professeur',
                'password' => '1234'
            ],[
                'nom' => 'Garcia',
                'prenom' => 'Laurent',
                'email' => 'Garcia.Laurent@etud.univ-angers.fr',
                'type_user' => 'Professeur',
                'password' => '1234'
            ]
        ]);
    }
}
