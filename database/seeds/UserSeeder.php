<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Administrador';
        $user->apusuario = 'Admin';
        $user->amusuario = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('administrador');
        $user->id_tipo = '1';
        $user->api_token = Str::random(80);
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Carlos Emmanuel';
        $user->apusuario = 'Dominguez';
        $user->amusuario = 'Reyes';
        $user->email = 'carlos.cedr3@gmail.com';
        $user->password = bcrypt('12345678');
        $user->id_tipo = '2';
        $user->api_token = Str::random(80);
        $user->save();
        $user->roles()->attach($role_user);
    }
}
