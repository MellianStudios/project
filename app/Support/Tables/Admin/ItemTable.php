<?php

namespace App\Support\Tables\Admin;

use App\Models\Category;
use App\Models\Item;
use App\Support\Tables\Structure\Actions;
use App\Support\Tables\Structure\Columns;
use App\Support\Tables\Structure\Filters;

class ItemTable
{
    private array|null $request = null;

    /**
     * @param array $request
     *
     * @return $this
     */
    public function addRequest(array $request): static
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'structure' => [
                'columns' => $this->getColumns(),
                'actions' => $this->getActions(),
                'filters' => $this->getFilters(),
            ],
            'items' => $this->getItems(),
        ];
    }

    /**
     * @return array
     */
    private function getColumns(): array
    {
        return (new Columns())
            ->addOwn('name', 'Name')
            ->addRelated('category', 'category', 'name', 'Category')
            ->toArray();
    }

    /**
     * @return array
     */
    private function getActions(): array
    {
        return (new Actions())
            ->create('admin.items.create')
            ->edit('admin.items.edit')
            ->delete('admin.items.destroy')
            ->toArray();
    }

    /**
     * @return array
     */
    private function getFilters(): array
    {
        $categories = Category::whereNull('parent_id')->get();

        $selected_category = null;

        if (isset($this->request['category'])) {
            $selected_category = Category::where('id', $this->request['category'])
                ->select(['id', 'name'])
                ->first();
        }

        return (new Filters())
            ->route('admin.items.index')
            ->addTreeSelect('category', 'sub_categories', 'Category', $categories, $selected_category)
            ->toArray();
    }

    private function getItems()
    {
        return Item::summary()
            ->when(isset($this->request->category), function ($q) {
                $q->where('category_id', $this->request['category']);
            })
            ->with([
                'category',
            ])->orderBy('id')
            ->paginate(15)
            ->withQueryString();
    }
}
