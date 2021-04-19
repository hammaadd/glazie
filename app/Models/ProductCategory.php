<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded= [];

    public function catrecord()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
   
    public function productcats()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
