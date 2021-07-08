<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Library\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Subject::upsert([
        ['id' => 1, 'name' => 'laravel', 'slug' => 'laravel'],
        ['id' => 2, 'name' => 'vuejs', 'slug' => 'vuejs'],
        ['id' => 3, 'name' => 'react', 'slug' => 'react'],
        ['id' => 4, 'name' => 'crm', 'slug' => 'crm'],
        ['id' => 5, 'name' => 'agile', 'slug' => 'agile'],
        ['id' => 6, 'name' => 'Everything else', 'slug' => 'everything-else'],
      ], ['name']);
    }
}
