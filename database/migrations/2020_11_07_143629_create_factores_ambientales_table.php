<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoresAmbientalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factores_ambientales', function (Blueprint $table) {
            $table->bigIncrements('id_factor')->unsigned();
            $table->string('nombre_factor',100);
            $table->unsignedBigInteger('id_variable');
            $table->timestamps();

            $table->foreign('id_variable')->references('id_variable')
                ->on('variables')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factores_ambientales');
    }
}
