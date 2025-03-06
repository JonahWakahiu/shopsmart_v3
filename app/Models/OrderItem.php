<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'discount',
        'total',
        'delivery_charge',
        'tax',
        'status',
        'product_id',
        'variation_id',
        'order_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variation(): BelongsTo
    {
        return $this->belongsTo(Variation::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class, 'order_item_id');
    }


    protected static function booted(): void
    {

        static::saving(function (self $item) {
            $product = Product::find($item->product_id);
            $variation = $product->variations()->find($item->variation_id);

            if ($variation) {
                $price = $variation->price;
                if ($variation->sale_price) {
                    $item->discount = $variation->price - $variation->sale_price;
                    $price = $variation->sale_price;
                }

                $item->total = $price * $item->quantity;
                $item->price = $variation->price;

            } else {
                $price = $product->price;
                if ($product->sale_price) {
                    $item->discount = $product->price - $product->sale_price;
                    $price = $product->sale_price;
                }

                $item->total = $price * $item->quantity;
                $item->price = $product->price;
            }
        });

        static::saved(function (self $item) {
            $order = Order::find($item->order_id);
            $order->subtotal = $order->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $order->discount = $order->items->sum(function ($item) {
                return $item->discount * $item->quantity;
            });
            $order->total = $order->items()->sum('total');
            $order->save();
        });
    }
}
