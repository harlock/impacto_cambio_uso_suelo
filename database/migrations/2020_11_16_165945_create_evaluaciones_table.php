<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id_evaluacion')->unsigned();
            $table->unsignedBigInteger('id_asignacriterio');
            $table->unsignedBigInteger('id_etapa');
            $table->unsignedBigInteger('id_proyecto');
            $table->string('valor');
            $table->timestamps();

            $table->foreign('id_asignacriterio')->references('id_asignacriterio')
                ->on('asigna_criterios')
                ->onDelete('cascade');

            $table->foreign('id_etapa')->references('id_etapa')
                ->on('etapas')
                ->onDelete('cascade');

            $table->foreign('id_proyecto')->references('id_proyecto')
                ->on('proyectos')
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
        Schema::dropIfExists('evaluaciones');
    }
}
