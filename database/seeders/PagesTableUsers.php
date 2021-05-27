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
                'email' => 'david.genest@gmail.com',
                'type_user' => 'Professeur',
                'password' => 'motdepasse',
                'admin' => 1,
                'supadmin'=>0
            ],[
                'id_professeur'=>6,
                'email' => 'martin.dieguez@gmail.com',
                'type_user' => 'Professeur',
                'password' => 'motdepasse',
                'admin'=>0,
                'supadmin'=>0
            ],[
                'id_professeur'=>8,
                'email' => 'laurent.garcia@gmail.com',
                'type_user' => 'Professeur',
                'password' => 'motdepasse',
                'admin'=>0,
                'supadmin'=>1
            ],[
                
                'email' => 'test.test@gmail.com',
                'type_user' => 'Membre_administratif',
                'password' => 'motdepasse',
                'admin'=>0,
                'supadmin'=>0
            ]
        ]);
    }
}
