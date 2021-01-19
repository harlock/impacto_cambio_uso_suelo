<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewValores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create or replace view valores as select distinct p.id_proyecto, f.id_factor,e.etapa,
            (select evaluaciones.valor from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa) as signo,
            (
            select sum(evaluaciones.valor) from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio!=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa
            ) as total
        from asigna_criterios s,factores_ambientales f, etapas e, evaluaciones v,criterios c, proyectos p where f.id_factor=s.id_factor and
        p.id_proyecto=v.id_proyecto and s.id_asignacriterio=v.id_asignacriterio and e.id_etapa=v.id_etapa and
        c.id_criterio=s.id_criterio and e.etapa like 'Preparación%'
        union all
            select distinct p.id_proyecto, f.id_factor,e.etapa,
            (select evaluaciones.valor from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa) as signo,
            (
            select sum(evaluaciones.valor) from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio!=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa
            ) as total
        from asigna_criterios s,factores_ambientales f, etapas e, evaluaciones v,criterios c, proyectos p where f.id_factor=s.id_factor and
        p.id_proyecto=v.id_proyecto and s.id_asignacriterio=v.id_asignacriterio and e.id_etapa=v.id_etapa and
        c.id_criterio=s.id_criterio and e.etapa like 'Construcción%'
        union all
            select distinct p.id_proyecto, f.id_factor,e.etapa,
            (select evaluaciones.valor from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa) as signo,
            (
            select sum(evaluaciones.valor) from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio!=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa
            ) as total
        from asigna_criterios s,factores_ambientales f, etapas e, evaluaciones v,criterios c, proyectos p where f.id_factor=s.id_factor and
        p.id_proyecto=v.id_proyecto and s.id_asignacriterio=v.id_asignacriterio and e.id_etapa=v.id_etapa and
        c.id_criterio=s.id_criterio and e.etapa like 'Mantenimiento%'
        union all
        select distinct p.id_proyecto, f.id_factor,e.etapa,
            (select evaluaciones.valor from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa) as signo,
            (
            select sum(evaluaciones.valor) from evaluaciones,asigna_criterios, factores_ambientales
            where evaluaciones.id_asignacriterio=asigna_criterios.id_asignacriterio and asigna_criterios.id_criterio!=1
            and asigna_criterios.id_factor=factores_ambientales.id_factor and factores_ambientales.id_factor=f.id_factor
            and evaluaciones.id_proyecto=p.id_proyecto and evaluaciones.id_etapa=e.id_etapa
            ) as total
        from asigna_criterios s,factores_ambientales f, etapas e, evaluaciones v,criterios c, proyectos p where f.id_factor=s.id_factor and
        p.id_proyecto=v.id_proyecto and s.id_asignacriterio=v.id_asignacriterio and e.id_etapa=v.id_etapa and
        c.id_criterio=s.id_criterio and e.etapa like 'Abandono%'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valores');
    }
}
