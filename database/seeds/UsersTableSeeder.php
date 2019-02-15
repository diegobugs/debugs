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
            'name' => 'Saul Clavijo',
            'username' => 'sclavijo',
            'email' => 'cs_clavijo@hotmail.com',
            'password' => bcrypt('testeo')
        ]);
    }
}
