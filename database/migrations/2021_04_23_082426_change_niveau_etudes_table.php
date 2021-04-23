<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNiveauEtudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_etudes', function (Blueprint $table) {
            $table->foreign('responsable_annee')->references("id_professeur")->on("professeurs");

        });
        DB::statement('ALTER TABLE niveau_etudes ADD CONSTRAINT chk_categorie CHECK (categorie in ("Licences","Masters","Autres Services"));');
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
