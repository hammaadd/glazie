<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CartDetails extends Model
{
    use HasFactory,SoftDeletes;
    
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    
   
   public function variation()
   {
       return $this->belongsTo(Variation::class, 'type_id');
   }
   public function addon()
   {
       return $this->belongsTo(AddOn::class, 'type_id');
   }
   
}
