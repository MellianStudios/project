<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperBrand
 */
class Brand extends Model
{
    /**
     * @return HasMany
     */
    public function families(): HasMany
    {
        return $this->hasMany(ItemFamily::class);
    }
}
