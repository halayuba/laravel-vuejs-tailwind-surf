<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::upsert([
        [
          'id' => 1,
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'is_admin' => true
        ]
      ], ['email']);
    }
}
