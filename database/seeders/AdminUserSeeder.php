<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       DB::table('users')->insert([
    [
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('adminpassword'),
        'user_type' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => Hash::make('johnpassword'),
        'user_type' => 'user',
        'created_at' => now(),
        'updated_at' => now(),
    ],
     [
        'name' => 'joyal jose',
        'email' => 'joyal@example.com',
        'password' => Hash::make('joyalpassword'),
        'user_type' => 'employee',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    
]);
    }
}
