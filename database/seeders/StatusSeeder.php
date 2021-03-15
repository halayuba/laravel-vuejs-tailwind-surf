<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::insert("INSERT INTO statuses (name) VALUES
         ('Completed'),
         ('Not Started'),
         ('Deferred'),
         ('In Progress'),
         ('Canceled'),
         ('Due soon'),
         ('Over due'),
         ('Extremely overdue')
       ");
    }
/*
 //== VALUES
//====================
('Completed'),
('Not Started'),
('Deferred'),
('In Progress'),
('Canceled'),
('Due soon'),
('Over due'),
('Extremely overdue')

 //== LOGIC & ASSUMPTIONS
//====================
- THE STATUS 'Not Started' WILL KEEP UPDATING UNTIL IT IS CHANGED TO ONE OF THE FOLLOWING: 'Completed', 'Deferred', 'In Progress', OR 'Canceled'
- THE FOLLOWING 3 VALUES ARE ASSOCIATED WITH 'Not Started' STATUS : 'Due soon', 'Over due', 'Extremely overdue'
- AFTER A NEW RECORD IS CREATED IT WILL BE AUTOMATICALLY ASSIGNED 'Not Started'
- AFTER A WEEK FROM 'created_at', THE STATUS WILL BE UPDATED TO 'Due soon'
- AFTER 2 WEEKS FROM 'created_at', THE STATUS WILL BE UPDATED TO 'Over due'
- AFTER 4 WEEKS FROM 'created_at', THE STATUS WILL BE UPDATED TO 'Extremely overdue'

*/

}
