<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['simple', 'variable']);
        $price = fake()->randomFloat(2, 100, 2000);
        $status = fake()->randomElement(['sheduled', 'published', 'out of stock', 'inactive']);
        $manageStock = fake()->boolean(30);

        return [
            'name' => fake()->words(rand(7, 15), true),
            'sku' => Product::generateSku(),
            'type' => $type,
            'short_description' => fake()->paragraph(rand(3, 5), true),
            'description' => fake()->paragraphs(rand(3, 5), true),
            'price' => $type == 'simple' ? $price : null,
            'sale_price' => $type == 'simple'
                ? (fake()->boolean(30)
                    ? fake()->randomFloat(2, $price * 0.6, $price * 0.9)
                    : null)
                : null,
            'manage_stock' => $manageStock,
            'stock' => $status === 'out of stock' ? null : ($manageStock ? fake()->numberBetween(1, 30) : null),
            'image' => 'https://picsum.photos/500/500?random=' . rand(1, 1000),
            'status' => $status,
            'publish_on' => $status === 'sheduled' ? fake()->dateTimeBetween('today', '+ 3 weeks') : null,
            'visibility' => fake()->randomElement(['public', 'private']),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            if ($product->type === 'variable') {
                $attributes = [
                    'size' => ['Small', 'Medium', 'Large', 'XL'],
                    'color' => ['Yellow', 'Blue', 'Green', 'Violet', 'Red', 'Gold'],
                ];

                foreach ($attributes as $key => $values) {
                    shuffle($values);
                    $randomCount = rand(1, count($values));
                    $groupedCombinations[$key] = array_slice($values, 0, $randomCount);
                }

                $keys = array_keys($groupedCombinations);
                $values = array_values($groupedCombinations);

                $combinations = [[]];

                foreach ($values as $array) {
                    $newResult = [];

                    foreach ($combinations as $res) {
                        foreach ($array as $value) {
                            $newResult[] = array_merge($res, [$value]);
                        }
                    }

                    $combinations = $newResult;
                }

                foreach ($combinations as $combination) {
                    $attributeAssoc = array_combine($keys, $combination);
                    Variation::factory()->create([
                        'attributes' => $attributeAssoc,
                        'product_id' => $product->id
                    ]);
                }

                $product->attributes = $groupedCombinations;
                $product->save();
            }
        });
    }
}
