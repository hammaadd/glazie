<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FrameGlass extends Model
{
    use HasFactory,SoftDeletes;
   
    public function modelframe()
    {
        return $this->belongsTo(ModelFrame::class, 'frame_id', 'id');
    }
}
