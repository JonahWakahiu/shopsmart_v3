<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'subtotal',
        'discount',
        'delivery_charge',
        'tax',
        'total',
        'user_id',
    ];

    // relationshiops
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function latestStatus(): HasOne
    {
        return $this->hasOne(OrderStatus::class, 'order_id')->latestOfMany()
            ->withDefault(['status' => 'processing']);
    }

    protected static function booted(): void
    {
        static::creating(function (self $order) {
            if (!$order->order_id) {
                $order->order_id = 'ORD-' . time() . '-' . Str::random(6);
            }
        });
    }
}
