<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PrdVariety extends Model
{
    use HasFactory,softDeletes;
    
    public function products()
    {
        return $this->hasMany(Products::class, 'verity_id', 'id');
    }
}
