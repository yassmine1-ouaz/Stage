<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImmobPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immob_photo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_immob')->unsigned();
            $table->foreign('id_immob')->references('id')->on('immobiliers')->onDelete('cascade');

            $table->integer('id_photo')->unsigned();
            $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immob_photo');
    }
}
