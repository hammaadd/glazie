<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariationDetails extends Model
{
    use HasFactory,SoftDeletes;
  /**
   * Get the user that owns the VariationDetails
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function variation()
  {
      return $this->belongsTo(Variation::class, 'variation_id');
  }
}
