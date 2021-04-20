<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesProfesseursTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professeurs', function (Blueprint $table) {
            $table->foreign("id_statut")->references("id_statut")->on("statuts");
            $table->foreign("id_dep")->references("id_dep")->on("departements");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professeurs', function (Blueprint $table) {
            //
        });
    }
}
