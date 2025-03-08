<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    /** @use HasFactory<\Database\Factories\AttributeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'watch_type',
        'watch_shape',
        'watch_size',

    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    protected static function booted()
    {
        static::creating(function (self $attribute) {
            if (!$attribute->slug) {
                $attribute->slug = Str::slug($attribute->name, '-');
            }
        });
    }
}
