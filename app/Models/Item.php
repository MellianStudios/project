<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperItem
 */
class Item extends Model
{
    use InteractsWithMedia, Searchable;

    protected $fillable = [
        'name',
        'short_description',
        'description',
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return $this->only(['id', 'name']);
    }

    /**
     * @return BelongsToMany
     */
    public function specs(): BelongsToMany
    {
        return $this->belongsToMany(ItemSpecificationType::class, 'item_specification')->withPivot(['value']);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function family(): BelongsTo
    {
        return $this->belongsTo(ItemFamily::class, 'item_family_id');
    }

    public function scopeSummary($query)
    {
        return $query->select(['id', 'name', 'short_description', 'category_id', 'item_family_id', 'created_at', 'updated_at']);
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    /**
     * @return HasOne
     */
    public function price(): HasOne
    {
        return $this->hasOne(Price::class)->latestOfMany();
    }
}
