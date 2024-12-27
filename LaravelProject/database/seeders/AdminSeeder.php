<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'address'=> 'street-123',
            'password' => Hash::make('Admin@123'), // Your admin password
            'role' => 'admin', // Assuming you have a role column in your table
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
