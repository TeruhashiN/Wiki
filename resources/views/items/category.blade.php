<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} — BloomCity Wiki</title>
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

                {{-- Back button --}}
                <a href="{{ route('items') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                    Back
                </a>

                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-xs text-slate-500">
                    <a href="{{ route('items') }}" class="hover:text-white transition-colors">Items</a>
                    <span>/</span>
                    <span class="text-slate-300 truncate">{{ $category->name }}</span>
                </nav>

                {{-- Category header --}}
                <section class="relative overflow-hidden rounded-2xl border border-slate-800 hero-gradient">
                    <div class="relative p-6 sm:p-8 lg:p-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/15 border border-indigo-400/30 text-indigo-300 text-xs font-semibold mb-4">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                            CATEGORY
                        </div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight">
                            {{ $category->name }}
                        </h1>
                        @if($category->description)
                            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl">
                                {{ $category->description }}
                            </p>
                        @endif
                        <p class="mt-2 text-xs text-slate-500">{{ $uploads->count() }} item{{ $uploads->count() !== 1 ? 's' : '' }} in this category</p>
                    </div>
                </section>

                {{-- Items grid --}}
                <section>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/50 p-6">
                        @forelse($groupedUploads as $letter => $items)
                            <div class="mb-6 last:mb-0">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="w-8 h-8 shrink-0 rounded-lg bg-indigo-500/15 border border-indigo-400/30 flex items-center justify-center text-sm font-bold text-indigo-300">{{ $letter }}</span>
                                    <span class="h-px flex-1 bg-slate-800"></span>
                                    <span class="text-[11px] text-slate-500 font-semibold">{{ $items->count() }} item{{ $items->count() !== 1 ? 's' : '' }}</span>
                                </div>
                                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach($items as $index => $upload)
                                        <a href="{{ route('uploads.show', $upload->id) }}" class="rounded-xl border border-slate-800 bg-slate-950/40 p-3 hover:border-slate-600 transition-colors block">
                                            <div class="flex items-center gap-3">
                                                @if($upload->image)
                                                    <img src="{{ asset('storage/' . $upload->image) }}" alt="{{ $upload->name }}" class="w-10 h-10 shrink-0 rounded-lg object-cover border border-slate-700">
                                                @else
                                                    <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-indigo-600/40 to-purple-600/30 border border-indigo-500/30 flex items-center justify-center text-slate-300">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                                    </div>
                                                @endif
                                                <div class="min-w-0">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-[10px] font-bold text-slate-500">{{ $index + 1 }}.</span>
                                                        <p class="text-sm font-bold text-white truncate group-hover:text-indigo-300 transition-colors">{{ $upload->name }}</p>
                                                        @if($upload->status === 'pending')
                                                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse shrink-0" title="Waiting for approval"></span>
                                                        @endif
                                                    </div>
                                                    @if($upload->price)
                                                         <p class="mt-1 text-xs font-bold text-emerald-400">🪙{{ number_format($upload->price, 2) }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-4xl mb-3">📦</p>
                                <p class="text-sm text-slate-400">No items uploaded yet in this category.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                {{-- Footer --}}
                @include('components.footer')
            </main>
        </div>
    </div>

</body>
</html>
