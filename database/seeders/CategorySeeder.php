<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Điện thoại',
                'description' => 'Điện thoại thông minh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phụ kiện',
                'description' => 'Phụ kiện điện thoại',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
