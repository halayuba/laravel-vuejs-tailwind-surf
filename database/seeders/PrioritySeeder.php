<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Learning\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::insert("INSERT INTO priorities (id, name) VALUES
          (1, 'Critical'),
          (2, 'High'),
          (3, 'Medium'),
          (4, 'Low'),
          (5, 'Very low')
        ");
    }
}
