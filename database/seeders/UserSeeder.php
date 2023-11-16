<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'duyvcph15143@fpt.edu.vn',
                'password' => bcrypt('12345678'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'vcduy.intern@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
