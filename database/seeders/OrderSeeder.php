<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LengthException;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        for ($i = 0; $i < count($users); $i++) {
            Order::insert([
                [
                    'order_date' => now(),
                    'user_id' => $users->id,
                ],
            ]);
        };
        
    }
}
