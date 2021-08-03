<?php

namespace App\Support\Forms\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ItemSpecificationType;
use App\Models\ItemSpecificationSelectOption;
use App\Models\ItemType;
use App\Support\Forms\Structure\Form;

class ItemForm
{
    private int|null $item_type_id;

    public function forItemType(int|null $item_type_id): self
    {
        $this->item_type_id = $item_type_id;

        return $this;
    }

    public function toArray(): array
    {
        return $this->item_type_id ? $this->createFullForm() : $this->createBasicForm();
    }

    private function createBasicForm(): array
    {
        $item_types = ItemType::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        return (new Form())
            ->route('admin.items.create')
            ->method('get')
            ->addSelect('item_type_id', 'Item type', $item_types)
            ->toArray();
    }

    private function createFullForm(): array
    {
        $specs = ItemSpecificationType::where('item_type_id', $this->item_type_id)->get();

        $item_types = ItemType::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        $categories = Category::whereNull('parent_id')->get();

        $brands = Brand::with(['families'])->get();

        $brand_options = $brands->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        $family_options = $brands->mapWithKeys(function ($item) {
            return [$item->id => $item->families];
        });

        $form = (new Form())
            ->route('admin.items.store')
            ->method('post')
            ->addSelect('item_type_id', 'Item type', $item_types, $this->item_type_id, true, true)
            ->addTreeSelect('category_id', 'sub_categories', 'Category', $categories)
            ->addInput('text', 'name', 'Item name')
            ->addSelect('brand_id', 'Brand', $brand_options)
            //->addSelect('item_family_id', 'Family', )
            ->addInput('text', 'short_description', 'Summary')
            ->addInput('text', 'description', 'Description');

        foreach ($specs as $spec) {
            if (in_array($spec->input_type, ['int', 'float', 'string'])) {
                $form->addInput($spec->input_type, $spec->system_name, $spec->name, null, $spec->required);
            } else if ($spec->type === 'select') {
                $options = ItemSpecificationSelectOption::where('item_specification_type_id', $spec->id)->get()->mapWithKeys(function ($item) {
                    return [$item->id => $item->name];
                })->toArray();

                $form->addSelect($spec->system_name, $spec->name, $options, null, $spec->required);
            }
        }

        return $form->toArray();
    }
}
