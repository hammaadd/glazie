<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Term extends Model
{
    use HasFactory,SoftDeletes;
   
    public function prdterms()
    {
        return $this->hasMany(ProductTerm::class, 'term_id');
    }
    
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
