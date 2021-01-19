<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Tipos_UsuariosSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(ColoniaSeeder::class);
        $this->call(CriterioSeeder::class);
        $this->call(Tipo_ProyectoSeeder::class);
        $this->call(EtapaSeeder::class);
        $this->call(SubsistemaSeeder::class);
        $this->call(VariableSeeder::class);
        $this->call(Factor_AmbientalSeeder::class);
        $this->call(Asigna_CriterioSeeder::class);
    }
}
