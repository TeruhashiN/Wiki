<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Upload;
use App\Models\WikiCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ItemsController extends Controller
{
    public function index(): View
    {
        $categories = WikiCategory::orderBy('name')->get();
        $uploads = Upload::with('category')->get();

        return view('components.items', [
            'categories' => $categories,
            'uploads' => $uploads,
        ]);
    }

    public function create(): View
    {
        $this->ensureModeratorOrAdmin();

        $categories = WikiCategory::orderBy('name')->get();
        $search = request()->query('search');
        $uploadsQuery = Upload::with('category')->orderBy('name');

        if ($search) {
            $uploadsQuery->where('name', 'like', '%'.$search.'%');
        }

        $uploads = $uploadsQuery->paginate(10)->withQueryString();

        $news = News::orderByDesc('date')->get();

        if (request()->ajax()) {
            return response()->json([
                'html' => view('items.partials.manage-items', compact('uploads'))->render(),
            ]);
        }

        return view('items.upload', [
            'categories' => $categories,
            'uploads' => $uploads,
            'search' => $search,
            'news' => $news,
        ]);
    }

    public function store(): RedirectResponse
    {
        $this->ensureModeratorOrAdmin();

        $validated = request()->validate(array_merge($this->itemRules(), $this->seedRules(), $this->toolRules()));

        $seedData = $validated['seed'] ?? [];
        $toolData = $validated['tool'] ?? [];

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        unset($validated['seed']);
        unset($validated['tool']);

        $upload = Upload::create($validated);

        if ($this->isSeedsCategory($validated['category_id'])) {
            $upload->seed()->create($seedData);
        }

        if ($this->isToolsCategory($validated['category_id'])) {
            $upload->tool()->create($toolData);
        }

        return back()->with('status', 'Item uploaded successfully.');
    }

    public function storeCategory(): RedirectResponse
    {
        $this->ensureAdmin();

        $validated = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:bloom.wiki_categories,slug'],
            'description' => ['nullable', 'string', 'max:2000'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        WikiCategory::create($validated);

        return back()->with('status', 'Category added successfully.');
    }

    public function storeNews(): RedirectResponse
    {
        $this->ensureModeratorOrAdmin();

        $validated = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:2000'],
            'news_by' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        News::create($validated);

        return back()->with('status', 'News added successfully.');
    }

    public function showNews(string $id): View
    {
        $newsItem = News::findOrFail($id);

        $relatedNews = News::where('id', '!=', $newsItem->id)
            ->orderByDesc('date')
            ->take(5)
            ->get();

        return view('news.show', [
            'newsItem' => $newsItem,
            'relatedNews' => $relatedNews,
        ]);
    }

    public function editNews(string $id): View
    {
        $this->ensureAdmin();

        $newsItem = News::findOrFail($id);

        return view('news.edit', [
            'newsItem' => $newsItem,
        ]);
    }

    public function updateNews(string $id): RedirectResponse
    {
        $this->ensureAdmin();

        $newsItem = News::findOrFail($id);

        $validated = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:2000'],
            'news_by' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        $newsItem->update($validated);

        return redirect()->route('items.upload', ['panel' => 'manageNews'])->with('status', 'News updated successfully.');
    }

    public function destroyNews(string $id): RedirectResponse
    {
        $this->ensureAdmin();

        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return back()->with('status', 'News deleted successfully.');
    }

    public function indexNews(): View
    {
        $newsItems = News::orderByDesc('date')->paginate(12);

        return view('news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    private function ensureAdmin(): void
    {
        $user = auth('bloom')->user();

        if (! $user || $user->role !== 'admin') {
            abort(403);
        }
    }

    private function ensureModeratorOrAdmin(): void
    {
        $user = auth('bloom')->user();

        if (! $user || ($user->role !== 'admin' && $user->role !== 'moderator' && $user->role !== 'bloom_user')) {
            abort(403);
        }
    }

    private function itemRules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:2048'],
            'category_id' => ['required', 'exists:bloom.wiki_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    private function seedRules(): array
    {
        return [
            'seed.grow_time' => ['nullable', 'string', 'max:255'],
            'seed.issue_count' => ['nullable', 'integer', 'min:0'],
            'seed.issue_duration' => ['nullable', 'string', 'max:255'],
            'seed.quality' => ['nullable', 'string', 'max:255'],
            'seed.merit_event' => ['nullable', 'string', 'max:255'],
        ];
    }

    private function toolRules(): array
    {
        return [
            'tool.broken_chance' => ['nullable', 'string', 'max:255'],
            'tool.problem' => ['nullable', 'string', 'max:255'],
        ];
    }

    private function isSeedsCategory(int $categoryId): bool
    {
        $slug = WikiCategory::where('id', $categoryId)->value('slug');

        return $slug === 'seeds';
    }

    private function isToolsCategory(int $categoryId): bool
    {
        $slug = WikiCategory::where('id', $categoryId)->value('slug');

        return $slug === 'tools';
    }

    public function show(string $slug): View
    {
        $category = WikiCategory::where('slug', $slug)->firstOrFail();
        $uploads = Upload::where('category_id', $category->id)->orderBy('name')->get();

        $grouped = $uploads->groupBy(function ($item) {
            return strtoupper(substr($item->name, 0, 1));
        })->sortKeys();

        return view('items.category', [
            'category' => $category,
            'uploads' => $uploads,
            'groupedUploads' => $grouped,
        ]);
    }

    public function showUpload(string $id): View
    {
        $upload = Upload::with(['category', 'seed', 'tool'])->findOrFail($id);
        $relatedUploads = Upload::where('category_id', $upload->category_id)
            ->where('id', '!=', $upload->id)
            ->orderBy('name')
            ->get();

        $grouped = $relatedUploads->groupBy(function ($item) {
            return strtoupper(substr($item->name, 0, 1));
        })->sortKeys();

        return view('items.show', [
            'upload' => $upload,
            'groupedUploads' => $grouped,
        ]);
    }

    public function edit(string $id): View
    {
        $this->ensureAdmin();

        $upload = Upload::with(['category', 'seed', 'tool'])->findOrFail($id);
        $categories = WikiCategory::orderBy('name')->get();

        return view('items.edit', [
            'upload' => $upload,
            'categories' => $categories,
        ]);
    }

    public function update(string $id): RedirectResponse
    {
        $this->ensureAdmin();

        $upload = Upload::findOrFail($id);

        $validated = request()->validate(array_merge($this->itemRules(), $this->seedRules(), $this->toolRules()));

        $seedData = $validated['seed'] ?? [];
        $toolData = $validated['tool'] ?? [];

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        unset($validated['seed']);
        unset($validated['tool']);

        $upload->update($validated);

        if ($this->isSeedsCategory($validated['category_id'])) {
            $upload->seed()->updateOrCreate(
                ['upload_id' => $upload->id],
                $seedData
            );
        } else {
            $upload->seed()->delete();
        }

        if ($this->isToolsCategory($validated['category_id'])) {
            $upload->tool()->updateOrCreate(
                ['upload_id' => $upload->id],
                $toolData
            );
        } else {
            $upload->tool()->delete();
        }

        return redirect()->route('items.upload', ['panel' => 'manage'])->with('status', 'Item updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->ensureAdmin();

        $upload = Upload::findOrFail($id);
        $upload->delete();

        return back()->with('status', 'Item deleted successfully.');
    }
}
