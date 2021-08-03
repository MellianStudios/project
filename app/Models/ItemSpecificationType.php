<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperItemSpecificationType
 */
class ItemSpecificationType extends Model
{
    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }
}
