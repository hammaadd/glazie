<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RequestHiring extends Model
{
    use HasFactory,SoftDeletes;


    public function customer(){
        return $this->belongsTo(User::class);
    }
    public function installer(){
        return $this->belongsTo(User::class);
    }
}
