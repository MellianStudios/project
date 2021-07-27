<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'layer',
    ];

    protected $with = ['subCategories'];

    /**
     * @return HasMany
     */
    public function subCategories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
