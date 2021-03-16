<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelGlass extends Model
{
    use HasFactory,SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo(AddOn::class, 'addon_id');
    }
    
    public function addons()
    {
        return $this->belongsTo(AddOn::class, 'addon_id');
    }
}
