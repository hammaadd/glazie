<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    use HasFactory,SoftDeletes;
    
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
    public function feedback()
    {
        return $this->hasMany(ProductReviews::class, 'products_id', 'id');
    }
    public function varities()
    {
        return $this->belongsTo(PrdVariety::class, 'verity_id', 'id');
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
    
    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    
    public function terms()
    {
        return $this->hasMany(ProductTerm::class, 'product_id', 'id');
    }
  
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
   
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id');
    }
   
    public function verities(): BelongsTo
    {
        return $this->belongsTo(PrdVariety::class, 'verity_id');
    } 

    
  
}
