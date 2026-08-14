<?php

namespace App\Http\Controllers;

use App\Models\BloomUser;
use App\Models\Seed;
use App\Models\Tool;
use App\Models\Upload;
use App\Models\WikiCategory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            [
                'label' => 'Wiki Categories',
                'value' => WikiCategory::count(),
                'icon' => 'game',
                'color' => 'text-indigo-400 bg-indigo-500/10 border-indigo-500/20',
            ],
            [
                'label' => 'Total Items',
                'value' => Upload::count(),
                'icon' => 'users',
                'color' => 'text-purple-400 bg-purple-500/10 border-purple-500/20',
            ],
            [
                'label' => 'Registered Users',
                'value' => BloomUser::count(),
                'icon' => 'chat',
                'color' => 'text-emerald-400 bg-emerald-500/10 border-emerald-500/20',
            ],
            [
                'label' => 'Seeds & Tools',
                'value' => Seed::count() + Tool::count(),
                'icon' => 'download',
                'color' => 'text-amber-400 bg-amber-500/10 border-amber-500/20',
            ],
        ];

        $trending = Upload::with('category')
            ->latest()
            ->take(4)
            ->get();

        $topRated = Upload::with('category')
            ->orderByDesc('price')
            ->take(5)
            ->get();

        $categories = WikiCategory::orderBy('name')->take(6)->get();

        return view('dashboard', compact('stats', 'trending', 'topRated', 'categories'));
    }
}
