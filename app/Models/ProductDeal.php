<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDeal extends Model
{
    use HasFactory,SoftDeletes;
    
    public function dealdetails()
    {
        return $this->hasMany(DealDetail::class, 'deal_id');
    }
}
