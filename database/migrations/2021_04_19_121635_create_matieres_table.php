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
            $table->increments("id_matiere");
            $table->string("nom_matiere");
            $table->UnsignedInteger("id_semestre")->nullable();
            $table->UnsignedInteger("responsable_matiere")->nullable();
            $table->UnsignedInteger("id_departement")->nullable();
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
