<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EtapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etapas')->insert([
            'etapa'=>'preparación',
        ]);
        DB::table('etapas')->insert([
            'etapa'=>'construcción',
        ]);
        DB::table('etapas')->insert([
            'etapa'=>'mantenimiento',
        ]);
        DB::table('etapas')->insert([
            'etapa'=>'abandono',
        ]);
    }
}
