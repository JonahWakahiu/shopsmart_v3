<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    //relationships
    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function generateSku()
    {
        do {
            $sku = 'SKU-' . Str::upper(Str::random(8));
        } while (self::where('sku', $sku)->exists());
        return $sku;
    }

    // cast
    protected function casts(): array
    {
        return [
            'short_description' => 'array',
            'description' => 'array',
            'attributes' => 'array',
            'tags' => 'array',
        ];
    }

    public function defaultVariation()
    {
        return $this->variations()->where('default', true)->first() ?? $this->variations()->first();
    }
}
