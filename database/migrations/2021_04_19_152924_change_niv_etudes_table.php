<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNivEtudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niv_etudes', function (Blueprint $table) {
            //
        });
        DB::statement('Alter table niv_etudes add constraint verifcategorie check (categorie in ("Licences","Masters","Autres services"));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('niv_etudes', function (Blueprint $table) {
            //
        });
    }
}
