<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News — BloomCity Wiki</title>
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
                        <div class="w-12 h-12 rounded-2xl border border-cyan-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-cyan-500/10">📰</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Edit News</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Update the news details below.</p>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-cyan-500/30 bg-slate-900/50 p-6 shadow-lg shadow-cyan-500/5">
                        <form action="{{ route('news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Title</label>
                                <input type="text" name="title" value="{{ old('title', $newsItem->title) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50" required>
                                @error('title')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Image</label>
                                <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                @error('image')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                @if($newsItem->image)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-32 h-32 object-cover rounded-xl border border-slate-700">
                                    </div>
                                @endif
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                <textarea name="description" rows="3" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50 resize-none">{{ old('description', $newsItem->description) }}</textarea>
                                @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">News By</label>
                                <input type="text" name="news_by" value="{{ old('news_by', $newsItem->news_by) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                @error('news_by')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Date</label>
                                <input type="date" name="date" value="{{ old('date', $newsItem->date->format('Y-m-d')) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                @error('date')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div class="flex gap-3">
                                <a href="{{ route('items.upload', ['panel' => 'manageNews']) }}" class="flex-1 py-3 rounded-xl text-sm font-bold text-slate-300 bg-slate-800 border border-slate-700 hover:bg-slate-700 transition-all text-center">
                                    Cancel
                                </a>
                                <button type="submit" class="flex-1 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-cyan-600 to-sky-600 hover:from-cyan-500 hover:to-sky-500 transition-all shadow-lg shadow-cyan-600/20 hover:shadow-xl hover:shadow-cyan-600/30">
                                    Update News
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
