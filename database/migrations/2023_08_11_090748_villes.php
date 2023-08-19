<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Villes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('gouvernorat_id')->unsigned();
            $table->foreign('gouvernorat_id')->references('id')->on('gouvernorat')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
