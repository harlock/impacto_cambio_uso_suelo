<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colonias')->insert([
            'nombre_colonia'=>'El Arco',
            'id_municipio'=>'1',
            'codigo_postal'=>'51217',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'SAN GASPAR',
            'id_municipio'=>'1',
            'codigo_postal'=>'51217',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'VILLA DE ALLENDE',
            'id_municipio'=>'3',
            'codigo_postal'=>'51000',
        ]);
        DB::table('colonias')->insert([
            'nombre_colonia'=>'VALLE DE BRAVO',
            'id_municipio'=>'1',
            'codigo_postal'=>'51200',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'COLORINES',
            'id_municipio'=>'1',
            'codigo_postal'=>'51230',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'DONATO  GUERRA',
            'id_municipio'=>'4',
            'codigo_postal'=>'51030',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'AMANALCO DE BECERRA',
            'id_municipio'=>'5',
            'codigo_postal'=>'51260',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'SANTO TOMAS',
            'id_municipio'=>'6',
            'codigo_postal'=>'51100',
        ]);

        DB::table('colonias')->insert([
            'nombre_colonia'=>'TEMASCALTEPEC',
            'id_municipio'=>'7',
            'codigo_postal'=>'51300',
        ]);
    }
}
