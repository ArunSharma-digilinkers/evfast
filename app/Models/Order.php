<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
            'total_amount',
            'coupon_id',
            'discount_amount',
            'subtotal',
            'gst_total',
            'shipping_amount',
            'payment_method',
            'payment_status',
            'payment_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
