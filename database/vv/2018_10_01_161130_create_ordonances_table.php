<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id')->unsigned();
            $table->integer('personnel_id')->unsigned();

            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('personnel_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordonances');
    }
}
