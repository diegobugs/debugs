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
<<<<<<< HEAD
        $this->call([
            UsersTableSeeder::class,
            ProjectsTableSeeder::class
        ]);
=======
        // Only seed the database with test data if the environment is local
        if (App::environment('local')){
            $this->call([
                UsersTableSeeder::class,
                ProjectsTableSeeder::class
            ]);
        }
>>>>>>> b12ef6c901511c8c4ae52a16b25ce3bb5ccc7fd7
    }
}
