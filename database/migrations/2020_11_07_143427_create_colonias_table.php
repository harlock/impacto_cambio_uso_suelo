<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonias', function (Blueprint $table) {
            $table->bigIncrements('id_colonia')->unsigned();
            $table->string('nombre_colonia');
            $table->unsignedBigInteger('id_municipio');
            $table->string('codigo_postal');
            $table->timestamps();
            $table->foreign('id_municipio')->references('id_municipio')
                ->on('municipios')
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
        Schema::dropIfExists('colonias');
    }
}
