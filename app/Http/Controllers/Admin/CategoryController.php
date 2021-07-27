<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Category/Index', [
            'categories' => Category::whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Category/Create', [
            'categories' => Category::whereNull('parent_id')->get(),
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
        if ($request->parent_id) {
            $parent_category = Category::find($request->parent_id);
        }

        Category::create([
            'name' => $request->name,
            'parent_id' => isset($parent_category) ? $parent_category->id : null,
            'layer' => isset($parent_category) ? $parent_category->layer + 1 : 1,
        ]);

        return Redirect::route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id): Response
    {
        return Inertia::render('Admin/Category/Edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        return Redirect::route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        return Redirect::route('admin.categories.index');
    }
}
