<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperItem
 */
class Item extends Model
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'short_description',
        'description',
    ];

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
}
