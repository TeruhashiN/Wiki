<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\WikiCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

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
        $this->ensureAdmin();

        $categories = WikiCategory::orderBy('name')->get();
        $search = request()->query('search');
        $uploadsQuery = Upload::with('category')->orderBy('name');

        if ($search) {
            $uploadsQuery->where('name', 'like', '%' . $search . '%');
        }

        $uploads = $uploadsQuery->paginate(10)->withQueryString();

        if (request()->ajax()) {
            return response()->json([
                'html' => view('items.partials.manage-items', compact('uploads'))->render(),
            ]);
        }

        return view('items.upload', [
            'categories' => $categories,
            'uploads' => $uploads,
            'search' => $search,
        ]);
    }

    public function store(): RedirectResponse
    {
        $this->ensureAdmin();

        $validated = request()->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'category_id' => ['required', 'exists:bloom.wiki_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ]);

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        Upload::create($validated);

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

    private function ensureAdmin(): void
    {
        $user = auth('bloom')->user();

        if (!$user || $user->role !== 'admin') {
            abort(403);
        }
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
        $upload = Upload::with('category')->findOrFail($id);
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

        $upload = Upload::with('category')->findOrFail($id);
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

        $validated = request()->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'category_id' => ['required', 'exists:bloom.wiki_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ]);

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('uploads', 'public');
            $validated['image'] = $path;
        }

        $upload->update($validated);

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
