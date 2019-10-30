<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayeConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paye_cons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultation_id')->unsigned();
            $table->integer('honoraire_id')->unsigned();
            $table->timestamps();
            $table->foreign('consultation_id')->references('id')->on('consultations');
            $table->foreign('honoraire_id')->references('id')->on('honoraires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paye_cons');
    }
}
