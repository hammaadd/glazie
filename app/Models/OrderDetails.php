<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetails extends Model
{
    use HasFactory,SoftDeletes;
 
 
    
  
  
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
   
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
 
}
