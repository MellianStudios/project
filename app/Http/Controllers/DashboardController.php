<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard', [
            'user' => Auth::user(),
            'categories' => Category::whereNull('parent_id')->get(),
            'items' => Item::summary()
                ->with([
                    'category',
                    'family' => fn($q) => $q->with(['brand']),
                    'price' => fn($q) => $q->with(['currency']),
                ])
                ->orderBy('id')
                ->cursorPaginate(),
        ]);
    }
}
