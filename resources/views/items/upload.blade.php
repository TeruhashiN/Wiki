<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/upload.css', 'resources/js/app.js', 'resources/js/upload.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>

    <div class="min-h-full flex">
        @include('components.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @include('components.header')

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <section class="max-w-3xl mx-auto">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-2xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-indigo-500/10">📤</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Upload Item</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Choose an action below to get started.</p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="grid sm:grid-cols-3 gap-4 mb-8">
                        <button type="button" id="btnCategory" class="action-btn group relative overflow-hidden rounded-2xl border-2 border-emerald-500/30 bg-slate-900/80 p-6 text-left hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-500/10">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 flex items-center justify-center text-2xl shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-bold text-white mb-1">Add Wiki Category</h3>
                                    <p class="text-xs text-slate-400 leading-relaxed">Create a new category for organizing wiki items.</p>
                                </div>
                                <svg class="w-5 h-5 shrink-0 text-emerald-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                            </div>
                        </button>

                        <button type="button" id="btnUpload" class="action-btn group relative overflow-hidden rounded-2xl border-2 border-indigo-500/30 bg-slate-900/80 p-6 text-left hover:border-indigo-400 hover:shadow-xl hover:shadow-indigo-500/10">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-2xl shadow-lg shadow-indigo-500/30 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-bold text-white mb-1">Upload Item</h3>
                                    <p class="text-xs text-slate-400 leading-relaxed">Add a new item with image, details, and pricing.</p>
                                </div>
                                <svg class="w-5 h-5 shrink-0 text-indigo-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                            </div>
                        </button>

                        <button type="button" id="btnManage" class="action-btn group relative overflow-hidden rounded-2xl border-2 border-amber-500/30 bg-slate-900/80 p-6 text-left hover:border-amber-400 hover:shadow-xl hover:shadow-amber-500/10">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-amber-600 to-orange-600 flex items-center justify-center text-2xl shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-bold text-white mb-1">Manage Items</h3>
                                    <p class="text-xs text-slate-400 leading-relaxed">Edit or delete existing uploads.</p>
                                </div>
                                <svg class="w-5 h-5 shrink-0 text-amber-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                            </div>
                        </button>
                    </div>

                    {{-- Category Form Panel --}}
                    <div id="panelCategory" class="panel">
                        <div class="rounded-2xl border border-emerald-500/30 bg-slate-900/50 p-6 shadow-lg shadow-emerald-500/5">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-emerald-500 to-teal-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Add Wiki Category</h2>
                                    <p class="text-xs text-slate-500">Fill in the details below to create a new category.</p>
                                </div>
                            </div>

                            <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
                                @csrf
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50" required>
                                        @error('name')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Slug</label>
                                        <input type="text" name="slug" value="{{ old('slug') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50" required>
                                        @error('slug')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                    <textarea name="description" rows="2" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50 resize-none">{{ old('description') }}</textarea>
                                    @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Icon</label>
                                        <input type="text" name="icon" value="{{ old('icon') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50">
                                        @error('icon')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Sort Order</label>
                                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50">
                                        @error('sort_order')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 transition-all shadow-lg shadow-emerald-600/20 hover:shadow-xl hover:shadow-emerald-600/30">
                                    Add Category
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Manage Items Panel --}}
                    <div id="panelManage" class="panel">
                        <div class="rounded-2xl border border-amber-500/30 bg-slate-900/50 p-6 shadow-lg shadow-amber-500/5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-amber-500 to-orange-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Manage Items</h2>
                                    <p class="text-xs text-slate-500">Edit or delete existing uploads.</p>
                                </div>
                            </div>

                            <form id="manageSearchForm" action="{{ route('items.upload') }}" method="GET" class="mb-4">
                                <input type="hidden" name="panel" value="manage">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Search</label>
                                <input id="manageSearchInput" type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search items..." class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500/50">
                            </form>

                            <div id="manageItemsList" class="max-h-[360px] overflow-y-auto space-y-2 pr-1">
                                @include('items.partials.manage-items', ['uploads' => $uploads])
                            </div>
                        </div>
                    </div>

                    {{-- Upload Form Panel --}}
                    <div id="panelUpload" class="panel">
                        <div class="rounded-2xl border border-indigo-500/30 bg-slate-900/50 p-6 shadow-lg shadow-indigo-500/5">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Upload Item</h2>
                                    <p class="text-xs text-slate-500">Fill in the details below to upload a new item.</p>
                                </div>
                            </div>

                            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                                @csrf
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Image</label>
                                    <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                    @error('image')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Category</label>
                                    <select name="category_id" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                        <option value="">Select category...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                    @error('name')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                    <textarea name="description" rows="2" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50 resize-none">{{ old('description') }}</textarea>
                                    @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Price</label>
                                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                    @error('price')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20 hover:shadow-xl hover:shadow-indigo-600/30">
                                    Save Item
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnCategory = document.getElementById('btnCategory');
            const btnUpload = document.getElementById('btnUpload');
            const btnManage = document.getElementById('btnManage');
            const panelCategory = document.getElementById('panelCategory');
            const panelUpload = document.getElementById('panelUpload');
            const panelManage = document.getElementById('panelManage');

            function openPanel(panel) {
                panelCategory.classList.remove('open');
                panelUpload.classList.remove('open');
                panelManage.classList.remove('open');
                panel.classList.add('open');
            }

            btnCategory.addEventListener('click', () => openPanel(panelCategory));
            btnUpload.addEventListener('click', () => openPanel(panelUpload));
            btnManage.addEventListener('click', () => openPanel(panelManage));
        });
    </script>
