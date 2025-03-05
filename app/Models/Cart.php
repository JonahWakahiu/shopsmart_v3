<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = [
        'subtotal',
        'discount',
        'delivery_charge',
        'tax',
        'total',
        'user_id'
    ];

    // relationships
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
