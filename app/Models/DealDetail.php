<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DealDetail extends Model
{
    use HasFactory,SoftDeletes;
   
    public function productdeal()
    {
        return $this->belongsTo(ProductDeal::class, 'deal_id');
    }
   
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
