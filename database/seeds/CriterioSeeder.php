<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CriterioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criterios')->insert([
            'descripcion'=>'Signo',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Intensidad',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Extensión',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Momento',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Persistencia',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Reversibilidad',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Sinergia',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Acumulación',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Efecto',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Periodicidad',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Recuperabilidad ',
        ]);
        DB::table('criterios')->insert([
            'descripcion'=>'Certidumbre',
        ]);
    }
}
