<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductSize extends Model
{
    use HasFactory,SoftDeletes;

  
    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}

