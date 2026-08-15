<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All News — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/items.css', 'resources/js/app.js', 'resources/js/items.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">
    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>
    <div class="min-h-full flex">
        @include('components.sidebar')
        <div class="flex-1 flex flex-col min-w-0">
            @include('components.header')
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="w-full">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                        Back
                    </a>

                    <nav class="flex items-center gap-2 text-xs text-slate-500 mt-2">
                        <a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Home</a>
                        <span>/</span>
                        <span class="text-slate-300">All News</span>
                    </nav>

                    <h1 class="text-3xl sm:text-4xl font-black text-white mt-6 border-b border-slate-800 pb-4">
                        All News
                    </h1>

                    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($newsItems as $n)
                            <a href="{{ route('news.show', $n->id) }}" class="group rounded-xl overflow-hidden border border-slate-800 bg-slate-900/50 hover:border-slate-600 transition-all hover:-translate-y-0.5">
                                <div class="h-24 bg-gradient-to-br from-indigo-600 to-purple-700 relative">
                                    @if($n->image)
                                        <img src="{{ asset('storage/'.$n->image) }}" alt="{{ $n->title }}" class="absolute inset-0 w-full h-full object-cover">
                                    @endif
                                    <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2225%22 cy=%2225%22 r=%222%22 fill=%22white%22/><circle cx=%2275%22 cy=%2275%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-sm font-bold text-white leading-snug group-hover:text-indigo-300 transition-colors line-clamp-2">{{ $n->title }}</h3>
                                    <p class="mt-2 text-[11px] text-slate-500 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $n->date->format('M d, Y') }}
                                    </p>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-slate-500 col-span-full">No news yet.</p>
                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $newsItems->links() }}
                    </div>
                </div>
                @include('components.footer')
            </main>
        </div>
    </div>
</body>
</html>
