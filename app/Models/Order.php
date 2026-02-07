<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
       protected $fillable = [
             'name',
            'email',
            'phone',
            'address',
            'pincode',      
            'state',      
            'city',      
            'total_amount',
            'payment_method',
            'payment_status',
            'payment_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
