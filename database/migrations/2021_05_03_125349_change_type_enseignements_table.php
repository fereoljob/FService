<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeTypeEnseignementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_enseignements', function (Blueprint $table) { 
        });
        DB::statement('ALTER TABLE type_enseignements ADD CONSTRAINT chk_type_en CHECK (nom_type_enseignement in ("C/TD","C","TD","TP","Responsable_matière"));');
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
