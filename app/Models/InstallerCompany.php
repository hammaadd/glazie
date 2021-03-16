<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InstallerCompany extends Model
{
    use HasFactory,SoftDeletes;
    
    public function installer()
    {
        return $this->belongsTo(User::class, 'installer_id');
    }
}
