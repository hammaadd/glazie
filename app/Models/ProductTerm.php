<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductTerm extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'product_id',
       'attribute_id',
       'term_id'
    ];

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'id');
    }
    
}
