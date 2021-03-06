<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AddonHinge extends Model
{
    use HasFactory,SoftDeletes;
   
    public function addon()
    {
        return $this->belongsTo(Addon::class, 'addon_id');
    }
}
