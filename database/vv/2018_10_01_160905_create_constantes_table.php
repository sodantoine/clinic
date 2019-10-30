<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('temparature');
            $table->float('poids');
            $table->float('taille');
            $table->float('tension_bras_droit');
            $table->float('tension_bras_gauche');
            $table->float('pouls');
            $table->string('groupe_sanguin');
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
               $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contantes');
    }
}
