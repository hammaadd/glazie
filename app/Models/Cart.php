<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cart extends Model
{
    use HasFactory,SoftDeletes;
    public function product(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    
    public function cartdetails()
    {
        return $this->hasmany(CartDetails::class, 'cart_id');
    }
}
