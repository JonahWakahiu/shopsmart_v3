<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'variation_id',
        'quantity'
    ];

    // relationship
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variation(): BelongsTo
    {
        return $this->belongsTo(Variation::class);
    }

    protected static function booted(): void
    {
        static::saving(function (self $cartItem) {
            $product = Product::find($cartItem->product_id);
            $variation = $product->variations()->find($cartItem->variation_id);

            if ($variation) {
                $price = $variation->price;
                if ($variation->sale_price) {
                    $cartItem->discount = $variation->price - $variation->sale_price;
                    $price = $variation->sale_price;
                }

                $cartItem->total = $price * $cartItem->quantity;
                $cartItem->price = $variation->price;

            } else {
                $price = $product->price;
                if ($product->sale_price) {
                    $cartItem->discount = $product->price - $product->sale_price;
                    $price = $product->sale_price;
                }

                $cartItem->total = $price * $cartItem->quantity;
                $cartItem->price = $product->price;
            }
        });

        static::saved(function (self $cartItem) {
            $cart = Cart::find($cartItem->cart_id);
            $cart->subtotal = $cart->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $cart->discount = $cart->items->sum(function ($item) {
                return $item->discount * $item->quantity;
            });
            $cart->total = $cart->items()->sum('total');
            $cart->save();
        });

        static::deleted(function (self $cartItem) {
            $cart = Cart::find($cartItem->cart_id);
            $cart->subtotal = $cart->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $cart->discount = $cart->items->sum(function ($item) {
                return $item->discount * $item->quantity;
            });
            $cart->total = $cart->items()->sum('total');
            $cart->save();
        });
    }
}
