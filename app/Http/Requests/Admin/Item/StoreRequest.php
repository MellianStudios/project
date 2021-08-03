<?php

namespace App\Http\Requests\Admin\Item;

use App\Models\ItemSpecificationType;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!isset($this->item_type_id)) {
            return [
                'item_type_id' => [
                    'required',
                    'numeric',
                ],
            ];
        }

        $rules = [
            'name' => [
                'required',
                'unique:items',
                'string',
            ],
            'short_description' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
                'string',
            ],
            'category_id' => [
                'required',
                'numeric',
            ],
            'item_type_id' => [
                'required',
                'numeric',
            ],
            'item_family_id' => [
                'required',
                'numeric',
            ],
        ];

        $item_specification_types = ItemSpecificationType::where('item_type_id', $this->item_type_id)->get();

        foreach ($item_specification_types as $item_specification_type) {
            if ($item_specification_type->required) {
                $rules[$item_specification_type->system_name][] = 'required';
            }

            if ($item_specification_type->input_type === 'string') {
                $rules[$item_specification_type->system_name][] = 'string';
            } else {
                $rules[$item_specification_type->system_name][] = 'numeric';
            }
        }

        return $rules;
    }
}
