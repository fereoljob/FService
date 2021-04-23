<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivEtudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niv_etudes', function (Blueprint $table) {
            $table->increments("id_niveau");
            $table->string("nom_niveau");
            $table->string("categorie");
            $table->integer("responsable_annee");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niv_etudes');
    }
}
