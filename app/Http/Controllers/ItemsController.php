<?php

namespace App\Http\Controllers;

use App\Models\WikiCategory;
use Illuminate\View\View;

class ItemsController extends Controller
{
    /**
     * Show the items page with a Wikipedia-style category section list.
     */
    public function index(): View
    {
        $categories = WikiCategory::orderBy('sort_order')->get();

        return view('components.items', [
            'categories' => $categories,
        ]);
    }
}

