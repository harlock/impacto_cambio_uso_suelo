<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tipo_ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_proyectos')->insert([
            'nombre_proyecto'=>'Carretera',
        ]);
        DB::table('tipo_proyectos')->insert([
            'nombre_proyecto'=>'Invernadero',
        ]);
        DB::table('tipo_proyectos')->insert([
            'nombre_proyecto'=>'Casa',
        ]);
        DB::table('tipo_proyectos')->insert([
            'nombre_proyecto'=>'Planta',
        ]);
    }
}
