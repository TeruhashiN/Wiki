<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item — BloomCity Wiki</title>
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
                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('items.upload') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                            Back
                        </a>
                    </div>

                    <div class="rounded-2xl border border-indigo-500/30 bg-slate-900/50 p-6 shadow-lg shadow-indigo-500/5">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-1 h-8 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"></div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Edit Item</h2>
                                <p class="text-xs text-slate-500">Update the details for this item.</p>
                            </div>
                        </div>

                        <form action="{{ route('uploads.update', $upload->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Image</label>
                                <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                @error('image')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Category</label>
                                <select name="category_id" id="categorySelect" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                    <option value="">Select category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-slug="{{ $category->slug }}" {{ $upload->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Name</label>
                                <input type="text" name="name" value="{{ old('name', $upload->name) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                @error('name')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                <textarea name="description" rows="4" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50 resize-none">{{ old('description', $upload->description) }}</textarea>
                                @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Price</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $upload->price) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                @error('price')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            {{-- Seed-specific fields (shown when Category = Seeds) --}}
                            @php
                                $currentCategory = $categories->firstWhere('id', old('category_id', $upload->category_id));
                            @endphp
                            <div id="seedFields" class="{{ ($currentCategory && $currentCategory->slug === 'seeds') ? '' : 'hidden' }}">
                                <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-4 space-y-4">
                                    <h3 class="text-sm font-bold text-indigo-400">Seed Details</h3>

                                    <div class="grid sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Grow Time</label>
                                            <input type="text" name="seed[grow_time]" value="{{ old('seed.grow_time', $upload->seed->grow_time ?? '') }}" placeholder="e.g. 2h 30m" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('seed.grow_time')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Issue Count</label>
                                            <input type="number" name="seed[issue_count]" value="{{ old('seed.issue_count', $upload->seed->issue_count ?? 0) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('seed.issue_count')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Issue Duration</label>
                                        <input type="text" name="seed[issue_duration]" value="{{ old('seed.issue_duration', $upload->seed->issue_duration ?? '') }}" placeholder="e.g. Every 4h" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                        @error('seed.issue_duration')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Quality</label>
                                        <input type="text" name="seed[quality]" value="{{ old('seed.quality', $upload->seed->quality ?? '') }}" placeholder="e.g. 50" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                        @error('seed.quality')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Merit Event</label>
                                        <input type="text" name="seed[merit_event]" value="{{ old('seed.merit_event', $upload->seed->merit_event ?? '') }}" placeholder="e.g. -10 Rainy, +10 Sunny" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                        @error('seed.merit_event')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tool-specific fields (shown when Category = Tools) --}}
                            <div id="toolFields" class="{{ ($currentCategory && $currentCategory->slug === 'tools') ? '' : 'hidden' }}">
                                <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-4 space-y-4">
                                    <h3 class="text-sm font-bold text-indigo-400">Tool Details</h3>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">BrokenChance Percent</label>
                                        <input type="text" name="tool[broken_chance]" value="{{ old('tool.broken_chance', $upload->tool->broken_chance ?? '') }}" placeholder="e.g. 10%" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                        @error('tool.broken_chance')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Problem</label>
                                        <input type="text" name="tool[problem]" value="{{ old('tool.problem', $upload->tool->problem ?? '') }}" placeholder="e.g. Fishing Rate, Energy Cost Reduction" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                        @error('tool.problem')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 pt-2">
                                <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20">
                                    Update Item
                                </button>
                                <a href="{{ route('items.upload') }}" class="px-6 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </div>

</body>
</html>
