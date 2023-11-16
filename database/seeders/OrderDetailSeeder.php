<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $products = Product::select('id')->get();
        // $orders = Order::select('id')->get();
        // for ($i = 0; $i < count($orders); $i++) {
        //     OrderDetail::insert([
        //         [
        //             'order_id' => $orders->id,
        //             'product_id' => [rand($products->id), ],
                    
        //         ]
        //     ]);
        // };
    }
}
