<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            'Size' => ['Small', 'Medium', 'Large', 'XL', 'XXL'],
            'Color' => ['Red', 'Blue', 'Black', 'White', 'Green'],
            'Material' => ['Cotton', 'Polyester', 'Wool', 'Denim', 'Leather'],
            'Storage' => ['64GB', '128GB', '256GB', '512GB', '1TB'],
        ];

        foreach ($attributes as $attributeName => $values) {
            // Create Attribute
            $attribute = Attribute::create(['name' => $attributeName]);

            // Create related AttributeValues
            foreach ($values as $value) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name' => $value,
                ]);
            }
        }

        Product::factory()->count(100)->has(Image::factory()->count(rand(5, 7)))->create();
    }
}
