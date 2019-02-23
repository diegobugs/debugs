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
        // Only seed the database with test data if the environment is local
        if (App::environment('local')){
            $this->call([
                UsersTableSeeder::class,
                ProjectsTableSeeder::class
            ]);
        }
    }
}
