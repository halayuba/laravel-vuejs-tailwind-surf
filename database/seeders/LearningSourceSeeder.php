<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LearningSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::insert("INSERT INTO sources (`name`) VALUES
          ('Article'),
          ('Book'),
          ('Codecourse'),
          ('Laracasts'),
          ('Lynda'),
          ('Github'),
          ('Youtube'),
          ('Webinar'),
          ('OReilley'),
          ('Udemy'),
          ('Newsletter'),
          ('Website')          
        ");
    }
}
