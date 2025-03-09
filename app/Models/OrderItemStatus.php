<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItemStatus extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemStatusFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'note',
        'changed_by',
        'item_id',
    ];

    // relationships
    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }
}
