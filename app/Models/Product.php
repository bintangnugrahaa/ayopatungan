<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'thumbnail',
        'photo',
        'about',
        'tagline',
        'price',
        'duration',
        'capacity',
        'is_popular',
        'price_per_person',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => [
                'name' => $value,
                'slug' => Str::slug($value)
            ]
        );
    }
    public function groups(): HasMany
    {
        return $this->hasMany(SubscriptionGroup::class);
    }

    public function keypoints(): HasMany
    {
        return $this->hasMany(ProductKeypoint::class);
    }

    public function howItWorks(): HasMany
    {
        return $this->hasMany(HowItWorks::class);
    }
}
