<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameWiki — The Game Encyclopedia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    <style>
        .sidebar-scroll::-webkit-scrollbar { width: 5px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 999px; }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: #475569; }
        .hero-gradient {
            background:
                radial-gradient(ellipse 80% 60% at 70% 20%, rgba(99,102,241,0.35), transparent),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(217,70,239,0.25), transparent),
                linear-gradient(135deg, #0f172a 0%, #1e1b4b 55%, #2e1065 100%);
        }
    </style>
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

                {{-- Hero spotlight --}}
                <section class="relative overflow-hidden rounded-2xl border border-slate-800 hero-gradient">
                    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%222%22 fill=%22white%22/><circle cx=%2280%22 cy=%2280%22 r=%222%22 fill=%22white%22/><circle cx=%2250%22 cy=%2250%22 r=%221%22 fill=%22white%22/></svg>');"></div>

                    <div class="relative p-6 sm:p-10 lg:p-12 grid lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-xs font-semibold mb-4">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                NEWS OF THE WEEK
                            </div>
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight">
                                <a href="{{ route('news.show', $newsOfTheWeek->id) }}" class="hover:text-emerald-300 transition-colors">
                                    {{ $newsOfTheWeek->title }}
                                </a>
                            </h1>
                            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed max-w-lg">
                                {{ $newsOfTheWeek->description }}
                            </p>

                            <div class="mt-5 flex flex-wrap items-center gap-3">
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">
                                    {{ $newsOfTheWeek->date->format('M d, Y') }}
                                </span>
                                @if($newsOfTheWeek->news_by)
                                    <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">
                                        By {{ $newsOfTheWeek->news_by }}
                                    </span>
                                @endif
                            </div>

                            <div class="mt-6 flex flex-wrap gap-3">
                                <a href="{{ route('news.show', $newsOfTheWeek->id) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 transition-all shadow-xl shadow-emerald-600/30">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                                    Read Article
                                </a>
                                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-slate-800/80 hover:bg-slate-700/80 border border-slate-700 transition-all">
                                    All News
                                </a>
                            </div>
                        </div>

                        {{-- Hero visual --}}
                        <div class="relative rounded-xl border border-slate-700/50 bg-slate-900/60 backdrop-blur overflow-hidden">
                            @if($newsOfTheWeek->image)
                                <img src="{{ asset('storage/'.$newsOfTheWeek->image) }}" alt="{{ $newsOfTheWeek->title }}" class="w-full h-64 object-contain">
                            @else
                                <div class="h-64 bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

                {{-- Stats row --}}
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($stats as $stat)
                        <div class="flex items-center gap-4 rounded-xl border border-slate-800 bg-slate-900/50 p-4 sm:p-5 hover:border-slate-700 hover:bg-slate-900 transition-all">
                            <div class="w-11 h-11 shrink-0 rounded-lg border flex items-center justify-center {{ $stat['color'] }}">
                                @if($stat['icon'] === 'game')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/></svg>
                                @elseif($stat['icon'] === 'users')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                @elseif($stat['icon'] === 'chat')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="text-xl sm:text-2xl font-black text-white">{{ number_format($stat['value']) }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </section>

                {{-- Trending games grid + Top rated --}}
                <div class="grid xl:grid-cols-3 gap-6 lg:gap-8">

                    {{-- Latest Items --}}
                    <section class="xl:col-span-2">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25l-2.25 3-2.25 3H3v-6zM3 12h7.5l2.25 3 2.25 3H3v-6z"/></svg>
                                Latest Items
                            </h2>
                            <a href="{{ route('items') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">View All →</a>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            @php
                                $gradients = [
                                    'from-cyan-500 via-blue-600 to-indigo-700',
                                    'from-purple-500 via-fuchsia-600 to-pink-700',
                                    'from-orange-500 via-red-500 to-rose-600',
                                    'from-emerald-500 via-teal-600 to-cyan-700',
                                ];
                            @endphp
                            @foreach($trending as $i => $game)
                                <a href="{{ route('uploads.show', $game->id) }}" class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 hover:border-slate-600 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-900/20">
                                    <div class="relative h-32 bg-gradient-to-br {{ $gradients[$i % 4] }} overflow-hidden">
                                         @if($game->image)
                                             <img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->name }}" class="absolute inset-0 w-full h-full object-contain object-center z-10">
                                         @endif
                                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%223%22 fill=%22white%22/><circle cx=%2280%22 cy=%2270%22 r=%224%22 fill=%22white%22/><circle cx=%2250%22 cy=%2285%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                        <div class="absolute bottom-3 right-3 w-10 h-10 rounded-full bg-slate-950/70 backdrop-blur flex items-center justify-center opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 010 1.972l-11.54 6.347a1.125 1.125 0 01-1.667-.986V5.653z"/></svg>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-start justify-between gap-2">
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-white text-sm truncate group-hover:text-indigo-300 transition-colors">{{ $game->name }}</h3>
                                                <p class="text-xs text-slate-500 mt-0.5">{{ $game->category?->name ?? 'Uncategorized' }}</p>
                                            </div>
                                            @if($game->price)
                                                <span class="flex items-center gap-1 text-xs font-bold text-emerald-400 shrink-0">
                                                     🪙{{ number_format($game->price, 2) }}
                                                </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>

                    {{-- Top rated list --}}
                    <section>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                Top Items
                            </h2>
                            <a href="{{ route('items') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">See All →</a>
                        </div>

                        <div class="rounded-xl border border-slate-800 bg-slate-900/50 divide-y divide-slate-800/70">
                            @php
                                $topGradients = [
                                    'from-emerald-500 to-teal-600',
                                    'from-red-500 to-rose-600',
                                    'from-indigo-500 to-purple-600',
                                    'from-amber-500 to-orange-600',
                                    'from-sky-500 to-blue-600',
                                ];
                            @endphp
                            @foreach($topRated as $i => $t)
                                <a href="{{ route('uploads.show', $t->id) }}" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 transition-colors group">
                                    <span class="w-7 h-7 shrink-0 rounded-lg bg-gradient-to-br {{ $topGradients[$i % 5] }} flex items-center justify-center text-white text-xs font-black shadow-md">{{ $i + 1 }}</span>
                                    <span class="flex-1 min-w-0">
                                        <span class="block text-sm font-semibold text-white truncate group-hover:text-indigo-300 transition-colors">{{ $t->name }}</span>
                                        <span class="block text-[11px] text-slate-500">{{ $t->category?->name ?? 'Uncategorized' }}</span>
                                    </span>
                                    @if($t->price)
                                        <span class="flex items-center gap-1 text-xs font-bold text-emerald-400 shrink-0">
                                             🪙{{ number_format($t->price, 2) }}
                                        </span>
                                    @endif
                                </a>
                            @endforeach
                        </div>

                        {{-- Quick category filter pills --}}
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($categories as $category)
                                <a href="{{ route('categories.show', $category->slug) }}" class="text-xs font-semibold text-slate-400 bg-slate-900 border border-slate-800 hover:border-indigo-500 hover:text-white hover:bg-indigo-500/10 rounded-full px-3 py-1.5 transition-colors">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- Latest news --}}
                <section>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                            Latest News
                        </h2>
                        <a href="{{ route('news.index') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">All News →</a>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($news as $n)
                            <a href="{{ route('news.show', $n->id) }}" class="group rounded-xl overflow-hidden border border-slate-800 bg-slate-900/50 hover:border-slate-600 transition-all hover:-translate-y-0.5">
                                <div class="h-24 bg-gradient-to-br from-indigo-600 to-purple-700 relative">
                                    @if($n->image)
                                        <img src="{{ asset('storage/'.$n->image) }}" alt="{{ $n->title }}" class="absolute inset-0 w-full h-full object-contain">
                                    @endif
                                    <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2225%22 cy=%2225%22 r=%222%22 fill=%22white%22/><circle cx=%2275%22 cy=%2275%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                    <span class="absolute top-3 left-3 text-[10px] font-bold px-2 py-0.5 rounded bg-slate-950/60 backdrop-blur border border-white/20 text-white">News</span>
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
                </section>

                {{-- Footer --}}
                @include('components.footer')
            </main>
        </div>
    </div>

</body>
</html>

