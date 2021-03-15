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
          (1, 'Very low'),
          (2, 'Low'),
          (3, 'Medium'),
          (4, 'High'),
          (5, 'Critical')
        ");
    }
}
