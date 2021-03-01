<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory,SoftDeletes;
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
    
    public function deliverytime()
    {
        return $this->belongsTo(DeliveryTime::class, 'delivery_id');
    }
    
}
