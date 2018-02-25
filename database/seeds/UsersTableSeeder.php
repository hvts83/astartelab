<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'nombre' => 'Administrador',
         'apellido' => 'Maestro'
         'email' => 'admin',
         'password' => bcrypt('admin50'),
         'rol' => 'A',
     ]);
    }
}
