<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonColor extends Model
{
    use HasFactory;
  
    public function user()
    {
        return $this->belongsTo(colors::class, 'addon_id');
    }
}
