<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre'=>'Valle de Bravo',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'Villa Victoria',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'VILLA DE ALLENDE',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'DONATO GUERRA',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'AMANALCO',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'SANTO TOMAS DE LOS PALTANOS',
            'id_estado'=>'10'
        ]);
        DB::table('municipios')->insert([
            'nombre'=>'TEMASCALTEPEC',
            'id_estado'=>'10'
        ]);
    }
}
