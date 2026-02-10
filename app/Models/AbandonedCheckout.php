<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbandonedCheckout extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'pincode',
        'state',
        'city',
        'cart_data',
        'total_amount',
        'coupon_code',
        'recovered',
        'recovered_order_id',
    ];

    protected $casts = [
        'cart_data' => 'array',
        'recovered' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recoveredOrder()
    {
        return $this->belongsTo(Order::class, 'recovered_order_id');
    }
}
