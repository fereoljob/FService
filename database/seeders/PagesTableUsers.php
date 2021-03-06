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
            [   'id_professeur' => 9,
                'email' => 'david.genest@email.com',
                'type_user' => 'Professeur',
                'password' => 'Motdepasse',
                'admin' => 1,
                'supadmin'=>0
            ],[
                'id_professeur'=>6,
                'email' => 'martin.dieguez@email.com',
                'type_user' => 'Professeur',
                'password' => 'Motdepasse',
                'admin'=>0,
                'supadmin'=>0
            ],[
                'id_professeur'=>8,
                'email' => 'laurent.garcia@email.com',
                'type_user' => 'Professeur',
                'password' => 'Motdepasse',
                'admin'=>0,
                'supadmin'=>1
            ],[
                'id_professeur'=>null,
                'email' => 'test.test@email.com',
                'type_user' => 'Membre_administratif',
                'password' => 'Motdepasse',
                'admin'=>0,
                'supadmin'=>0
            ]
        ]);
    }
}
