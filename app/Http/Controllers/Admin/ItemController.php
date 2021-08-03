<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\IndexRequest;
use App\Http\Requests\Admin\Item\StoreRequest;
use App\Http\Requests\Admin\Item\TypeRequest;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Models\Item;
use App\Services\Item as ItemService;
use App\Support\Forms\Admin\ItemForm;
use App\Support\Tables\Admin\ItemTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ItemTable $itemTable
     * @param IndexRequest $request
     *
     * @return Response
     */
    public function index(ItemTable $itemTable, IndexRequest $request): Response
    {
        return Inertia::render('Admin/Item/Index', [
            'table' => $itemTable
                ->addRequest($request->validated())
                ->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ItemForm $itemForm
     * @param TypeRequest $request
     *
     * @return Response
     */
    public function create(ItemForm $itemForm, TypeRequest $request): Response
    {
        return Inertia::render('Admin/Item/Create', [
            'form' => $itemForm
                ->forItemType($request->item_type_id)
                ->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemService $item
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ItemService $item, StoreRequest $request): RedirectResponse
    {
        $item->createFromRequest($request->validated());

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
        Item::destroy($id);

        return Redirect::route('admin.items.index');
    }
}
