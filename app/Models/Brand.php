<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperBrand
 */
class Brand extends Model
{
    use InteractsWithMedia;

    /**
     * @return HasMany
     */
    public function families(): HasMany
    {
        return $this->hasMany(ItemFamily::class);
    }
}
