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
    public function type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }

    /**
     * @return BelongsTo
     */
    public function family(): BelongsTo
    {
        return $this->belongsTo(ItemFamily::class, 'item_family_id');
    }
}
