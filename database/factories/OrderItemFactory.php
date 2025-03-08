<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::where('visibility', 'public')->inRandomOrder()->with('variations')->first();
        $variation = $product->variations?->shuffle()->first();

        return [
            'quantity' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            'product_id' => $product->id,
            'variation_id' => $variation?->id,
        ];
    }
}
