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
 
   public function model()
    {
       return $this->belongsTo(AddOn::class, 'type_id');
    }
    public function color()
    {
       return $this->belongsTo(AddonColor::class,'type_id');
    }
 
    public function frame()
    {
        return $this->belongsTo(ModelFrame::class, 'type_id');
    }
    public function framecolor()
    {
        return $this->belongsTo(FrameDetails::class, 'type_id');
    }
   
    public function frameglass()
    {
        return $this->belongsTo(FrameGlass::class, 'type_id');
    }
    
    public function furniture()
    {
        return $this->belongsTo(AddonFurniture::class, 'type_id');
    }
    
    public function hinge()
    {
        return $this->belongsTo(AddonHinge::class, 'type_id');
    }
    
   
}
