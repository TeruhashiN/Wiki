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
        $categories = WikiCategory::orderBy('sort_order')->get();
        $uploads = Upload::with('category')->get();

        return view('components.items', [
            'categories' => $categories,
            'uploads' => $uploads,
        ]);
    }

    public function create(): View
    {
        $categories = WikiCategory::orderBy('sort_order')->get();

        return view('items.upload', [
            'categories' => $categories,
        ]);
    }

    public function store(): RedirectResponse
    {
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

    public function show(string $slug): View
    {
        $category = WikiCategory::where('slug', $slug)->firstOrFail();
        $uploads = Upload::where('category_id', $category->id)->get();

        return view('items.category', [
            'category' => $category,
            'uploads' => $uploads,
        ]);
    }

    public function showUpload(string $id): View
    {
        $upload = Upload::with('category')->findOrFail($id);

        return view('items.show', [
            'upload' => $upload,
        ]);
    }
}
