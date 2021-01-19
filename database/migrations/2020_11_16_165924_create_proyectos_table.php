<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id_proyecto')->unsigned();
            $table->string('nombre_proyecto',500);
            $table->string('descripcion',1500);
            $table->unsignedBigInteger('id_compania');
            $table->unsignedBigInteger('id_user');
            $table->date('fecha');
            $table->unsignedBigInteger('id_tipoproyecto');
            $table->unsignedBigInteger('id_colonia');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_tipoproyecto')->references('id_tipoproyecto')
                ->on('tipo_proyectos')
                ->onDelete('cascade');

            $table->foreign('id_colonia')->references('id_colonia')
                ->on('colonias')
                ->onDelete('cascade');

            $table->foreign('id_compania')->references('id_compania')
                ->on('companias')
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
        Schema::dropIfExists('proyectos');
    }
}
