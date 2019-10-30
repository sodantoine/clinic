<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lit_nom');
            $table->integer('chambre_id')->unsigned();
            $table->timestamps();
            $table->foreign('chambre_id')->references('id')->on('chambres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lits');
    }
}
