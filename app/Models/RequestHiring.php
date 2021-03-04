<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RequestHiring extends Model
{
    use HasFactory,SoftDeletes;


    public function customer(){
        return $this->belongsTo(User::class,"customer_id");
    }
    public function installer(){
        return $this->belongsTo(User::class ,"installer_id");
    }

    public function testmonial()
    {
        return $this->hasOne(Testmonial::class, 'rh_id');
    }
}
