<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Immobiliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immobiliers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name')->nullable();;

               $table->integer('immob_type')->unsigned();
              $table->foreign('immob_type')->references('id')->on('type_immob')->onDelete('cascade');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('etat')->nullable();
            $table->text('description')->nullable();
            $table->integer('surface')->nullable();
              $table->integer('ville_id')->unsigned();
              $table->foreign('ville_id')->references('id')->on('gouvernorat')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->integer('prix')->nullable();

             // $table->integer('photo_id')->unsigned();
            // $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');

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
        Schema::dropIfExists('immobiliers');
    }
}
