<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\StoreRequest;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Item/Index', [
            'tableStructure' => [
                'columns' => [
                    'name' => [
                        'type' => 'own',
                        'key' => 'name',
                        'label' => 'Name',
                    ],
                    'category' => [
                        'type' => 'relation',
                        'relation' => 'category',
                        'key' => 'name',
                        'label' => 'Category',
                    ],
                ],
                'actions' => [
                    'create' => 'admin.items.create',
                    'edit' => 'admin.items.edit',
                    'delete' => 'admin.items.destroy',
                ],
                'filters' => [
                    'route' => 'admin.items.index',
                    'item' => [
                        'type' => 'text',
                        'label' => 'Search item',
                    ],
                    'category' => [
                        'type' => 'tree_select',
                        'options' => Category::whereNull('parent_id')->get(),
                        'nested_key' => 'sub_categories',
                        'label' => 'Category',
                    ],
                ],
            ],
            'items' => Item::summary()
                ->with([
                    'category',
                    'family' => fn($q) => $q->with(['brand']),
                    'price' => fn($q) => $q->with(['currency']),
                ])->orderBy('id')
                ->paginate(15)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Item/Create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        return Redirect::route('admin.items.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(int $id): Response
    {
        return Inertia::render('Admin/Item/Edit', [
            'item' => Item::with([
                'specs',
                'category',
                'family' => fn($q) => $q->with(['brand']),
                'price' => fn($q) => $q->with(['currency'])
            ])->cursorPaginate(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        return Redirect::route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        return Redirect::route('admin.items.index');
    }
}
