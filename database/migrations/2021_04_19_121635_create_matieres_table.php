<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->increments("id_mat");
            $table->string("intitule_mat");
            $table->string("description");
            $table->string("type_mat");
            $table->integer("nbre_heure");
            $table->integer("nbre_gr");
            $table->integer("coef");
            $table->integer("id_semestre");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
