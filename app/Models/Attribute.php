<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory,SoftDeletes;
    
    public function prdattrs()
    {
        return $this->hasMany(ProductAttribute::class, 'attribute_id', 'id');
    }
   
    public function terms()
    {
        return $this->hasMany(Term::class, 'attribute_id');
    }
}
