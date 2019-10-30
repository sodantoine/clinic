<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHonorairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honoraires', function (Blueprint $table) {
            $table->increments('id');
            $table->float('paye');
            $table->float('reste');
            $table->integer('code');
            $table->integer('id_type_honoraire')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->timestamps();
            $table->foreign('id_type_honoraire')->references('id')->on('type_honoraires');
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
        Schema::drop('honoraires');
    }
}
