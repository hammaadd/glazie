<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestHiring extends Model
{
    use HasFactory;


    public function customer(){
        return $this->belongsTo(User::class);
    }
    public function installer(){
        return $this->belongsTo(User::class);
    }
}
