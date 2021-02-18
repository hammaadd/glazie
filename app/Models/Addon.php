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
}
