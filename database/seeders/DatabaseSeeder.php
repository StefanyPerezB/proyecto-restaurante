<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        

        \App\Models\User::factory()->create([
            'name' => 'AdministradorSistema',
            'email' => 'adminsistema@gmail.com',
            'password' => bcrypt('administradorsistema')
         ])->assignRole('AdministradorSistema');

         \App\Models\User::factory()->create([
           'name' => 'Administrador',
           'email' => 'administrador@gmail.com',
           'password' => bcrypt('administrador')
        ])->assignRole('Administrador');

        \App\Models\User::factory()->create([
           'name' => 'Recepcionista',
           'email' => 'recepcionista@gmail.com',
           'password' => bcrypt('recepcionista')
        ])->assignRole('Recepcionista');

        \App\Models\User::factory()->create([
           'name' => 'Mesero',
           'email' => 'mesero@gmail.com',
           'password' => bcrypt('mesero')
        ])->assignRole('Mesero');

        \App\Models\User::factory()->create([
         'name' => 'JefeCompras',
         'email' => 'jefecompras@gmail.com',
         'password' => bcrypt('jefecompras')
      ])->assignRole('JefeCompras');

      \App\Models\User::factory()->create([
         'name' => 'JefeAlmacen',
         'email' => 'jefealmacen@gmail.com',
         'password' => bcrypt('jefealmacen')
      ])->assignRole('JefeAlmacen');

    }
}
