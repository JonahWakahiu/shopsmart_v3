<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variation extends Model
{
    /** @use HasFactory<\Database\Factories\VariationFactory> */
    use HasFactory;

    // relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // casts

    protected function casts(): array
    {
        return [
            'description' => 'array',
            'attributes' => 'array',
        ];
    }


    protected static function booted(): void
    {
        static::saved(function (self $variation) {
            $product = Product::find($variation->product_id);

            $stock = $product->variations()->sum('stock');
            $product->stock = $stock;
            $product->save();
        });
    }
}
