<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
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
                        aria-expanded="true"
                        aria-controls="contentsList">
                        <span class="flex items-center gap-2 text-lg font-bold text-white">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                            </svg>
                            Contents
                        </span>
                        <span class="flex items-center gap-3">
                            <span class="text-xs text-slate-500">{{ $categories->count() }} categories</span>
                            <svg id="contentsChevron" class="w-5 h-5 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </span>
                    </button>

                    {{-- Category list (Wikipedia-style) --}}
                    <div id="contentsList" class="rounded-2xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                        @forelse($categories as $index => $category)
                            <a href="#category-{{ $category->slug }}"
                               class="flex items-center gap-4 p-4 sm:p-5 hover:bg-slate-800/50 transition-colors group {{ $index > 0 ? 'border-t border-slate-800/70' : '' }}">
                                <span class="w-11 h-11 shrink-0 rounded-xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                    {{ $category->icon ?? '📁' }}
                                </span>
                                <span class="flex-1 min-w-0">
                                    <span class="block text-sm sm:text-base font-bold text-white group-hover:text-indigo-300 transition-colors">{{ $category->name }}</span>
                                    @if($category->description)
                                        <span class="block text-xs text-slate-500 mt-0.5 truncate">{{ $category->description }}</span>
                                    @endif
                                </span>
                                <span class="shrink-0 text-xs font-semibold text-slate-500 bg-slate-800 border border-slate-700 rounded-lg px-2.5 py-1">#{{ $category->sort_order }}</span>
                                <svg class="w-4 h-4 shrink-0 text-slate-600 group-hover:text-indigo-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </a>
                        @empty
                            <div class="p-10 text-center">
                                <p class="text-4xl mb-3">🗂️</p>
                                <p class="text-sm text-slate-400">No categories yet. Run the seeder to populate content.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                {{-- Category detail sections --}}
                @foreach($categories as $category)
                    <section id="category-{{ $category->slug }}" class="scroll-mt-24">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-10 h-10 shrink-0 rounded-xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-xl">
                                {{ $category->icon ?? '📁' }}
                            </span>
                            <div class="min-w-0">
                                <h2 class="text-lg font-bold text-white">{{ $category->name }}</h2>
                                @if($category->description)
                                    <p class="text-xs text-slate-500">{{ $category->description }}</p>
                                @endif
                            </div>
                            <a href="#" class="ml-auto text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">View All →</a>
                        </div>

                        <div class="rounded-2xl border border-slate-800 bg-slate-900/50 p-6">
                            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @for($i = 1; $i <= 3; $i++)
                                    <div class="rounded-xl border border-slate-800 bg-slate-950/40 p-4 hover:border-slate-600 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-600/40 to-purple-600/30 border border-indigo-500/30 flex items-center justify-center text-slate-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                                </svg>
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-sm font-bold text-white truncate">Sample {{ $category->name }} #{{ $i }}</p>
                                                <p class="text-[11px] text-slate-500">Placeholder entry</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </section>
                @endforeach

                {{-- Footer --}}
                <footer class="pt-4 border-t border-slate-800/70 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-600">
                    <p>© 2026 BloomCity Wiki — The Game Encyclopedia. Fan-made project.</p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="hover:text-slate-400 transition-colors">About</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Contact</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Privacy</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Terms</a>
                    </div>
                </footer>
            </main>
        </div>
    </div>

</body>
</html>
