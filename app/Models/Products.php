<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $fillable = [
       
    ];
    public function gallery(){
        return $this->hasMany(Productgallery::class,'products_id','id');
    }
    public function productsattribute(){
        return $this->hasMany(ProductAttribute::class);
    }
 
    public function categories()
    {
        return $this->hasMany(ProductCategory::class,'product_id','id');
    }
    public function brands()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }
}
