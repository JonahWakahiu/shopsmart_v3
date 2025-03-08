<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'rating',
        'message',
        'anonymous',
        'user_id',
        'product_id',
        'order_item_id',
    ];

    // relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Anonymous',
            'avatar' => asset('images/anonymous.svg'),
        ]);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }


    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value === 'published' ? 'publish'
            : ($value === 'cancelled' ? 'cancel' : $value),

            set: fn(string $value) => $value === 'publish' ? 'published'
            : ($value === 'cancel' ? 'cancelled' : $value),
        );
    }

    protected static function booted(): void
    {
        static::creating(function (self $review) {
            if (!$review->review_id) {
                $review->review_id = 'RVW-' . time() . '-' . Str::random(6);
            }
            if ($review->anonymous) {
                $review->user_id = null;
            }
        });

    }
}
