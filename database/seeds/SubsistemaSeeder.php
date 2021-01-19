<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubsistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subsistemas')->insert([
            'nombre_subsistema'=>'Biótico',
        ]);
        DB::table('subsistemas')->insert([
            'nombre_subsistema'=>'Antrópico',
        ]);
        DB::table('subsistemas')->insert([
            'nombre_subsistema'=>'Físico',
        ]);
    }
}
