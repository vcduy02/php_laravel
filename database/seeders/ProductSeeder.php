<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'iPhone 14 Pro Max 1TB',
                'description' => 'Chính hãng VN/A',
                'price' => 41999999,
                'image' => 'iphone14pm1t.jpg',
                'category_id' => '1',
                'brand_id' => '1',
                'quantity' => 20,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra 12GB 1TB',
                'description' => '',
                'price' => 39990999,
                'image' => 'ssglxs23u12gb1t.jpg',
                'category_id' => '2',
                'brand_id' => '2',
                'quantity' => 30,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
