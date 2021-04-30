<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddOn extends Model
{
    use HasFactory,SoftDeletes;
   
    public function colors()
    {
        return $this->hasMany(AddonColor::class, 'addon_id', 'id');
    }
    public function frames()
    {
        return $this->hasMany(ModelFrame::class, 'addon_id', 'id');
    }
    
    public function glass()
    {
        return $this->hasMany(ModelGlass::class, 'addon_id', 'id');
    }
    
    public function furniture()
    {
        return $this->hasMany(AddonFurniture::class, 'addon_id', 'id');
    }
    public function hinges()
    { 
        return $this->hasMany(AddonHinge::class, 'addon_id', 'id');
    }
    
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
