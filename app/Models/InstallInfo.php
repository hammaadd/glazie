<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InstallInfo extends Model
{
    use HasFactory,SoftDeletes;
    /**
     * Get the user that owns the InstallInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function installer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'installer_id', );
    }
}
