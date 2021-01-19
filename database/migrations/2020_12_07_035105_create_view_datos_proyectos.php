<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewDatosProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE or REPLACE VIEW datos_proyectos as SELECT p.id_proyecto,p.nombre_proyecto as
        nombreproyecto,p.descripcion as descripción,u.name as promovente,u.apusuario as appromovente,u.amusuario as
        ampromovente,c.nombre_compania as nomcompania,co.nombre_colonia as colonia,m.nombre as municipio,e.nombre as estado,
        p.fecha from proyectos p, users u,companias c,colonias co,municipios m,estados e WHERE u.id_user=p.id_user and
        c.id_compania=p.id_compania and co.id_colonia=p.id_colonia and m.id_municipio=co.id_municipio and e.id_estado=m.id_estado");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_proyectos');
    }
}
