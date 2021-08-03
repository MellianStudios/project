<?php

namespace App\Services;

use App\Models\Item as Model;
use App\Models\ItemSpecification;
use App\Models\ItemSpecificationType;

class Item
{
    public function createFromRequest(array $request)
    {
        $item = Model::create([
            'name' => $request['name'],
            'short_description' => $request['short_description'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'item_type_id' => $request['item_type_id'],
            'item_family_id' => $request['item_family_id'],
        ]);

        $item_specs = ItemSpecificationType::where('item_type_id', $request['item_type_id'])->get();

        foreach ($item_specs as $item_spec) {
            ItemSpecification::create([
                'item_id' => $item->id,
                'item_specification_type_id' => $item_spec->id,
                'value' => $request[$item_spec->system_name],
            ]);
        }
    }
}
