<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()
            ->count(50)
            ->has(OrderItem::factory()
                ->count(rand(10, 20)), 'items')
            ->create();

        $orderItems = OrderItem::with(['order.user', 'product'])
            // ->where('status', 'delivered')
            // ->whereHas('order.payment', fn($query) => $query->where('status', 'completed'))
            ->get();


        $orderItems->map(function (OrderItem $item) {
            Review::factory()->create([
                'user_id' => $item->order->user->id,
                'product_id' => $item->product->id,
                'order_item_id' => $item->id,
                'status' => 'publish',
            ]);
        });
    }
}
