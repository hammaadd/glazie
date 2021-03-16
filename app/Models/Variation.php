<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use HasFactory,SoftDeletes;
    
    public function variationdetails()
    {
        return $this->hasMany(VariationDetails::class, 'variation_id');
    }
  
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
