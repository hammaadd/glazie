<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;


    public function cat()
    {
        return $this->hasMany(Categories::class,'parent_id','id');
    }
    public function prdouctcates()
    {
        return $this->hasMany('ProductCategory', 'category_id', 'id');
    }
}
