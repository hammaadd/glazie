<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductAttribute extends Model
{
    use HasFactory,SoftDeletes;
    
    public function products(){
        return $this->hasOne(Products::class,'product_id' );
    }
    
   
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
 
}
