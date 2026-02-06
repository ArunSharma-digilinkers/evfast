<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'sale_price',
        'short_description',
        'technical_features',
        'warranty',
        'quantity',
        'description',
        'status',
        'image',
        'images'
    ];

    // ✅ THIS IS REQUIRED
    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function addons()
    {
        return $this->belongsToMany(Addon::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'product_related',
            'product_id',
            'related_product_id'
        );
    }
}
