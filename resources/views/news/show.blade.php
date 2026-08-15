<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }} — BloomCity Wiki</title>
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
                        <a href="{{ route('news.index') }}" class="hover:text-white transition-colors">All News</a>
                        <span>/</span>
                        <span class="text-slate-300 truncate">{{ $newsItem->title }}</span>
                    </nav>

                    <div class="mt-6 rounded-2xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/'.$newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-64 sm:h-80 object-cover">
                        @endif

                        <div class="p-6 sm:p-8">
                            <h1 class="text-2xl sm:text-3xl font-black text-white leading-tight">
                                {{ $newsItem->title }}
                            </h1>

                            <div class="mt-4 flex flex-wrap items-center gap-4 text-xs text-slate-400">
                                @if($newsItem->news_by)
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.25h15a1.5 1.5 0 001.5-1.5V18a5.25 5.25 0 00-10.5 0v.75a1.5 1.5 0 01-1.5 1.5H4.5"/></svg>
                                        {{ $newsItem->news_by }}
                                    </span>
                                @endif
                                <span class="inline-flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                                    {{ $newsItem->date->format('F d, Y') }}
                                </span>
                            </div>

                            <div class="mt-6 text-sm sm:text-base text-slate-300 leading-relaxed whitespace-pre-line">
                                {{ $newsItem->description ?? 'No description provided.' }}
                            </div>
                        </div>
                    </div>

                    @if($relatedNews->count() > 0)
                        <div class="mt-10">
                            <h2 class="text-lg font-bold text-white mb-4">More News</h2>
                            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($relatedNews as $related)
                                    <a href="{{ route('news.show', $related->id) }}" class="group rounded-xl overflow-hidden border border-slate-800 bg-slate-900/50 hover:border-slate-600 transition-all hover:-translate-y-0.5">
                                        <div class="h-24 bg-gradient-to-br from-indigo-600 to-purple-700 relative">
                                            @if($related->image)
                                                <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->title }}" class="absolute inset-0 w-full h-full object-cover">
                                            @endif
                                            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2225%22 cy=%2225%22 r=%222%22 fill=%22white%22/><circle cx=%2275%22 cy=%2275%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-sm font-bold text-white leading-snug group-hover:text-indigo-300 transition-colors line-clamp-2">{{ $related->title }}</h3>
                                            <p class="mt-2 text-[11px] text-slate-500">{{ $related->date->format('M d, Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                @include('components.footer')
            </main>
        </div>
    </div>
</body>
</html>
