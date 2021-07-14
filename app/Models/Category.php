<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $with = ['subCategories'];

    /**
     * @return HasMany
     */
    public function subCategories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
