<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
     protected $fillable = ['name', 'price', 'status'];

     public function products()
{
    return $this->belongsToMany(Product::class);
}
}




