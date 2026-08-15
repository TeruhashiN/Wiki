<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/items.css', 'resources/js/app.js', 'resources/js/items.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    {{-- Mobile overlay --}}
    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>

    <div class="min-h-full flex">
        {{-- Sidebar --}}
        @include('components.sidebar')
        {{-- Main column --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Header --}}
            @include('components.header')
            {{-- Page content --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8 space-y-6 lg:space-y-8">
                {{-- Page title --}}
                <section class="relative overflow-hidden rounded-2xl border border-slate-800 hero-gradient">
                    <div class="relative p-6 sm:p-8 lg:p-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/15 border border-indigo-400/30 text-indigo-300 text-xs font-semibold mb-4">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                            WIKI LIBRARY
                        </div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight">
                            Items <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-fuchsia-400 bg-clip-text text-transparent">Catalog</span>
                        </h1>
                        <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl">
                            Browse our curated encyclopedia of game content. Each category groups related objects — from consumable items and seeds to building blocks and combat gear.
                        </p>
                    </div>
                </section>
                {{-- Wikipedia-style table of contents (collapsible) --}}
                <section>
                    <button id="contentsToggle"
                        class="w-full flex items-center justify-between gap-3 mb-4 p-4 rounded-2xl border border-slate-800 bg-slate-900/50 hover:border-slate-600 transition-colors text-left"
                        aria-expanded="false"
                        aria-controls="contentsList">
                        <span class="flex items-center gap-2 text-lg font-bold text-white">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                            </svg>
                            Contents
                        </span>
                        <span class="flex items-center gap-3">
                            <span class="text-xs text-slate-500">{{ $categories->count() }} categories</span>
                            <svg id="contentsChevron" class="w-5 h-5 text-slate-400 transition-transform duration-300" style="transform: rotate(-90deg);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </span>
                    </button>
                    {{-- Category list (Wikipedia-style) --}}
                    <div id="contentsList" class="hidden rounded-2xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                        <div class="grid grid-cols-2 gap-0 divide-x divide-slate-800">
                            @forelse($categories as $category)
                                <a href="#category-{{ $category->slug }}"
                                   class="flex items-center gap-2 p-2.5 hover:bg-slate-800/50 transition-colors group {{ !$loop->first && $loop->odd ? 'border-l border-slate-800/70' : '' }}">
                                    <span class="w-7 h-7 shrink-0 rounded-md border border-slate-700 bg-slate-800/80 flex items-center justify-center text-sm group-hover:scale-110 transition-transform">
                                        {{ $category->icon ?? '📁' }}
                                    </span>
                                    <span class="flex-1 min-w-0">
                                        <span class="block text-xs font-bold text-white group-hover:text-indigo-300 transition-colors truncate">{{ $category->name }}</span>
                                    </span>
                                    <svg class="w-3.5 h-3.5 shrink-0 text-slate-600 group-hover:text-indigo-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                    </svg>
                                </a>
                            @empty
                                <div class="col-span-full p-6 text-center">
                                    <p class="text-2xl mb-2">🗂️</p>
                                    <p class="text-xs text-slate-400">No categories yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>
                {{-- Category detail sections --}}
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach($categories as $category)
                        @php
                            $categoryUploads = $uploads->where('category_id', $category->id);
                        @endphp
                        <section id="category-{{ $category->slug }}" class="scroll-mt-24 rounded-2xl border border-slate-800 bg-slate-900/50 p-4 hover:border-slate-700 transition-colors">
                            <div class="flex items-center gap-2.5 mb-3">
                                <span class="w-8 h-8 shrink-0 rounded-lg border border-slate-700 bg-slate-800/80 flex items-center justify-center text-base">
                                    {{ $category->icon ?? '📁' }}
                                </span>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-sm font-bold text-white truncate">{{ $category->name }}</h3>
                                </div>
                                <a href="{{ route('categories.show', $category->slug) }}" class="text-[10px] font-semibold text-indigo-400 hover:text-indigo-300 transition-colors shrink-0">View All →</a>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @forelse($categoryUploads->take(10) as $upload)
                                    <a href="{{ route('uploads.show', $upload->id) }}" class="shrink-0 inline-flex items-center gap-1.5 rounded-lg border border-slate-800 bg-slate-950/40 px-2 py-1.5 hover:border-slate-600 transition-colors">
                                        @if($upload->image)
                                            <img src="{{ asset('storage/' . $upload->image) }}" alt="{{ $upload->name }}" class="w-5 h-5 shrink-0 rounded object-cover border border-slate-700">
                                        @else
                                            <div class="w-5 h-5 shrink-0 rounded bg-gradient-to-br from-indigo-600/40 to-purple-600/30 border border-indigo-500/30 flex items-center justify-center text-slate-300">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                            </div>
                                        @endif
                                        <span class="text-[11px] font-bold text-white truncate">{{ $upload->name }}</span>
                                    </a>
                                @empty
                                    <span class="text-[11px] text-slate-500">No items uploaded yet.</span>
                                @endforelse
                            </div>
                        </section>
                    @endforeach
                </div>
                {{-- Footer --}}
                @include('components.footer')
            </main>
        </div>
    </div>
</body>
</html>
