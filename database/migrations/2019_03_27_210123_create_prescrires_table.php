<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescrires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('posologie');
            $table->string('quantite');
            $table->string('produit');
            $table->integer('ordonance_id')->unsigned();  
            $table->timestamps();
            $table->foreign('ordonance_id')->references('id')->on('ordonances');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescrires');
    }
}
