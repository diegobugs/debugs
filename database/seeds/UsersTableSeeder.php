<?php

use Illuminate\Database\Seeder;
use App\Object;

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
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@debugs.io',
                'password' => bcrypt('admin')
            ],
        ]);

        $object = new Object();

        $object->name = 'user';
        $object->plural_name = 'users';
        $object->label = 'User';
        $object->class_name = 'User';

        $object->save();

        $object->fields()->createMany([
            [
                'name' => 'username',
                'label' => 'Username',
                'type' => 'text'
            ],
            [
                'name' => 'email',
                'label' => 'E-Mail',
                'type' => 'email'
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'type' => 'password'
            ],
        ]);
    }
}
