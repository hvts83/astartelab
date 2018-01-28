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
         'name' => 'Admin',
         'email' => 'a.peraza@outlook.com',
         'password' => bcrypt('consueloendomingo'),
         'rol' => 'A',
     ]);
    }
}
