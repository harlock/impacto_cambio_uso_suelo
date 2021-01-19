<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_criterios', function (Blueprint $table) {
            $table->bigIncrements('id_asignacriterio')->unsigned();
            $table->unsignedBigInteger('id_factor');
            $table->unsignedBigInteger('id_criterio');
            $table->timestamps();

            $table->foreign('id_factor')->references('id_factor')
                ->on('factores_ambientales')
                ->onDelete('cascade');

            $table->foreign('id_criterio')->references('id_criterio')
                ->on('criterios')
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
        Schema::dropIfExists('asigna_criterios');
    }
}
