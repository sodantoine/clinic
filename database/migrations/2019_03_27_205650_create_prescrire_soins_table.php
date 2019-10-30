<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescrireSoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('prescrire_soins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('posologie');
            $table->string('quantite');
            $table->string('produit');
            $table->integer('soin_id')->unsigned();  
            $table->timestamps();
            $table->foreign('soin_id')->references('id')->on('soins');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescrire_soins');
    }
}
