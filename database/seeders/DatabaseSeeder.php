<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(LearningSourceSeeder::class);
        $this->call(LearningTypeSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
