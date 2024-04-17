<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'usertype' => 'admin', // Set the usertype to 'admin'
            'password' => Hash::make('password'), // Hash the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
