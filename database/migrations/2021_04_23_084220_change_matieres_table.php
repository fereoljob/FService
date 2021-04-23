<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matieres', function (Blueprint $table) {
            $table->foreign('id_semestre')->references("id_semestre")->on("semestres");
            $table->foreign('id_departement')->references("id_departement")->on("departements");
            $table->foreign('responsable_matiere')->references("id_professeur")->on("professeurs");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
