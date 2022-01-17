<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Learning\Type;

class LearningTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::upsert([
          ['id' => 1, 'name' => 'Coding'],
          ['id' => 2, 'name' => 'Design'],
          ['id' => 3, 'name' => 'Hosting'],
          ['id' => 4, 'name' => 'Security'],
          ['id' => 5, 'name' => 'DBMS'],
          ['id' => 6, 'name' => 'Business / PM'],
          ['id' => 7, 'name' => 'Ideas'],
          ['id' => 8, 'name' => 'Tools & Utilities'],
          ['id' => 9, 'name' => 'DevOps'],
        ], ['name']);
    }
}
