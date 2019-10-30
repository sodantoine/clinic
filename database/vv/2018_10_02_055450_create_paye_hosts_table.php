<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayeHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paye_hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospitalisation_id')->unsigned();
            $table->integer('honoraire_id')->unsigned();
            $table->timestamps();
            $table->foreign('hospitalisation_id')->references('id')->on('hospitalisations');
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
        Schema::dropIfExists('paye_hosts');
    }
}
