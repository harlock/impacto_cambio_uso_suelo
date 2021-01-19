<?php

use Illuminate\Database\Seeder;

class Tipos_UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuarios')->insert([
            'descripcion'=>'Administrador',
        ]);

        DB::table('tipos_usuarios')->insert([
            'descripcion'=>'Cliente',
        ]);
    }
}
