<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauEtudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_etudes', function (Blueprint $table) {
            $table->increments("id_niveau");
            $table->string("nom_niveau");
            $table->string("categorie");
            $table->UnsignedInteger("responsable_annee")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveau_etudes');
    }
}
