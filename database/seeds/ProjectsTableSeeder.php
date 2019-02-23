<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'skey' => 'TEST',
            'name' => 'Test project',
            'description' => 'This project has been created for testing purpose'
        ]);
    }
}
