<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSpecification extends Model
{
    protected $fillable = [
        'item_id',
        'item_specification_type_id',
        'value',
    ];
}
