<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $order->payment()->create([
                'amount' => $order->total,
                'status' => fake()->randomElement(['unpaid', 'completed', 'failed', 'refunded']),
                'payment_method' => fake()->randomElement(['card', 'paypal', 'mpesa']),
                'transaction_id' => Str::random(8),
            ]);
        });
    }
}
