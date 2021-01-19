<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variables')->insert([
            'nombre_variable'=>'Vegetación',
            'id_subsistema'=>'1',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Fauna',
            'id_subsistema'=>'1',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Comunidad biótica',
            'id_subsistema'=>'1',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Agua',
            'id_subsistema'=>'2',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Microclíma',
            'id_subsistema'=>'2',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Atmósfera',
            'id_subsistema'=>'2',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Suelo',
            'id_subsistema'=>'2',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Paisaje',
            'id_subsistema'=>'2',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Bienestar sicológico y espriritual',
            'id_subsistema'=>'3',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Social',
            'id_subsistema'=>'3',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Económico',
            'id_subsistema'=>'3',
        ]);
        DB::table('variables')->insert([
            'nombre_variable'=>'Urbanismo',
            'id_subsistema'=>'3',
        ]);
    }
}
