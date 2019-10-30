<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motif');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->integer('patient_id')->unsigned();
            $table->integer('personnel_id')->unsigned();
            $table->integer('id_lit')->unsigned();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('personnel_id')->references('id')->on('users');
            $table->foreign('id_lit')->references('id')->on('lits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospitalisations');
    }
}
